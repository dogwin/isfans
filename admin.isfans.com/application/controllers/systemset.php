<?php
/**
 * System 系统设置
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-29
 */
class Systemset extends Admin_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('auth_mdl','systemset_mdl'));
	}
	
	public function index(){
		$data = array();
		
		$this->_template('systemset/index',$data);
	}
	/**
	 * menus
	 */
	public function menus(){
		$page_num = $this->settings->item('backend_page_count');
		$keyword = $this->input->post("keyword");
		$word['keyword'] = $keyword;
		$total_rows = $this->systemset_mdl->get_menus_num($word);
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
		$data['list'] = $this->systemset_mdl->get_menus( $page_num, $offset,$word);
		$data['word'] = $word;
		
		$this->_template('systemset/menus/index',$data);
	}
	public function menus_edit(){
		$menuID = $this->uri->segment(3,0);
		$data['menuArr'] = $this->systemset_mdl->get_parent_menus_Arr(TRUE);
		if($menuID){
			//update
			$menuInfo = $this->systemset_mdl->get_menu_by_id($menuID);
			
		}else{
			//add
			
		}
		$this->_template('systemset/menus/edit',$data);
	}
	//-------------------------end menus------------------------------//
	
	
}