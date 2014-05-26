<?php
/**
 * Admin 管理员管理
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-05-20
 */
class Admin extends Admin_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('auth_mdl','systemset_mdl','admin_mdl'));
	}
	function index(){
		$page_num = $this->settings->item('backend_page_count');
		$keyword = $this->input->post("keyword");
		$word['keyword'] = $keyword;
		$total_rows = $this->admin_mdl->get_admin_num($word);
		$data['page'] = $offset = $this->input->get('page', TRUE) ? intval($this->input->get('page', TRUE)) : 1;
		$offset = $offset<1?1:$offset;
		$offset = (int) ( $offset - 1) * $page_num;
		//加载分页
		$this->load->library('pagination');
		$config['base_url'] = backend_url('systemset/menus') . '?';
		$config['per_page'] = $page_num;
		$config['total_rows'] = $total_rows;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['list'] = $this->admin_mdl->get_admin( $page_num, $offset,$word);
		$data['word'] = $word;
		$this->_template('admin/index',$data);
	}
	//管理修改
	function edit(){
		$id = $data['id'] = $this->uri->segment(3,0);
		$data['page'] = $this->uri->segment(4,0);
		$data['roleArr'] = $this->admin_mdl->get_role_arr();
		if($id){
			//admin info
			$admininfo = $this->admin_mdl->get_admin_by_id($id);
			if($admininfo){
				$data['username'] = $admininfo->username;
				$data['email'] = $admininfo->email;
				$data['role'] = $admininfo->role;
			}else{
				//not exist
				$this->_message("管理员不存在！", '', TRUE);
			}
		}else{
			//add new admin
			$data['username'] = '';
			$data['email'] = '';
			$data['role'] = '';
		}
		$this->_template('admin/edit',$data);
	}
	function editpost(){
		$id = $this->input->post('admin_id');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$page = $this->input->post('page');
		$data = array(
				'username'=>$username,
				'email'=>$email,
				'role'=>$role
		);
		if($id){
			//update
			$admininfo = $this->admin_mdl->get_admin_by_id($id);
			if($admininfo){	
				if($password){
					$data['password'] = $this->auth_mdl->dogwin_encrypt_password($password);
				}
				if($this->admin_mdl->update('administrator',$data,array('id'=>$id))){
					$this->admin_mdl->get_admin_by_id($id,TRUE);
					//$this->_message("管理员更新成功！", '', TRUE);
					$array = array('flag'=>true,'href'=>base_url('admin/index?page='.$page));
				}else{
					//$this->_message("管理员更新失败！", '', TRUE);
					$array = array('flag'=>false,'msg'=>'管理员更新失败！');
				}
			}else{
				//not exist
				//$this->_message("管理员不存在！", '', TRUE);
				$array = array('flag'=>false,'msg'=>'管理员不存在！');
			}
		}else{
			//add
			$data['password'] = $this->auth_mdl->dogwin_encrypt_password($password);
			if($id = $this->admin_mdl->insert('administrator',$data)){
				$this->admin_mdl->get_admin_by_id($id,TRUE);
				//$this->_message("管理员添加成功！", '', TRUE);
				$array = array('flag'=>true,'href'=>base_url('admin/index?page='.$page));
			}else{
				//$this->_message("管理员添加失败！", '', TRUE);
				$array = array('flag'=>false,'msg'=>'管理员添加失败！');
			}
		}
		echo json_encode($array);
	}
	//checkusername
	function checkusername(){
		$username = $this->input->post('username');
		$id = $this->input->post('admin_id');
		if($this->admin_mdl->get_admin_by_name($username,$id)){
			$array = array('flag'=>TRUE,'msg'=>'很抱歉用户已经存在！');
		}else{
			$array = array('flag'=>FALSE);
		}
		echo json_encode($array);
	}
	/**
	 * role
	 */
	function role(){
		$page_num = $this->settings->item('backend_page_count');
		$keyword = $this->input->post("keyword");
		$word['keyword'] = $keyword;
		$total_rows = $this->admin_mdl->get_role_num($word);
		$data['page'] = $offset = $this->input->get('page', TRUE) ? intval($this->input->get('page', TRUE)) : 1;
		$offset = $offset<1?1:$offset;
		$offset = (int) ( $offset - 1) * $page_num;
		//加载分页
		$this->load->library('pagination');
		$config['base_url'] = backend_url('systemset/menus') . '?';
		$config['per_page'] = $page_num;
		$config['total_rows'] = $total_rows;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['list'] = $this->admin_mdl->get_roles( $page_num, $offset,$word);
		$data['word'] = $word;
		$this->_template('admin/role/index',$data);
	}
	//role edit
	function role_edit(){
		//role id 
		$data = $this->admin_mdl->get_form_data();
		$data['id'] = $id = $this->uri->segment(4,0);
		$data['page'] = $this->uri->segment(5,0);
		
		if($id){
			$data['role'] = $roleinfo = $this->admin_mdl->get_role_by_id($id);
			$data['name'] = $roleinfo->name;
			$data['rightslist'] = $roleinfo->rights;
		}else{
			$data['name'] = "";
			$data['rightslist'] = ''; 
		}
		$this->_template('admin/role/edit',$data);
	}
	//end role
}