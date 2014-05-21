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
		$offset = $this->input->get('page', TRUE) ? intval($this->input->get('page', TRUE)) : 1;
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
		$data = array(
				'username'=>$username,
				'email'=>$email,
				'role'=>$role
		);
		if($id){
			//update
			$admininfo = $this->admin_mdl->get_admin_by_id($id);
			if($admininfo){	
				$data['password'] = $this->auth_mdl->dogwin_encrypt_password($password);
				if($this->admin_mdl->update('administrator',$data,array('id'=>$id))){
					
				}else{
					
				}
			}else{
				//not exist
				
			}
		}else{
			//add
		}
		
	}
}