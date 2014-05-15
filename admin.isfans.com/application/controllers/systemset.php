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
		$data['menuID'] = $menuID = $this->uri->segment(4,0);
		$data['menuArr'] = $this->systemset_mdl->get_parent_menus_Arr(TRUE);
		
		if($menuID){
			//update
			$menuInfo = $this->systemset_mdl->get_menu_by_id($menuID);
			if($menuInfo){
				$data['class_name'] = $menuInfo->class_name;
				$data['method_name'] = $menuInfo->method_name;
				$data['menu_name'] = $menuInfo->menu_name;
				$data['menu_level'] = $menuInfo->menu_level;
				$data['menu_parent'] = $menuInfo->menu_parent;
			}else{
				$this->_message("不存在此菜单！", '', TRUE);
			}
		}else{
			//add
			$data['class_name'] = '';
			$data['method_name'] = '';
			$data['menu_name'] = '';
			$data['menu_level'] = 2;
			$data['menu_parent'] = 1;
		}
		
		$this->_template('systemset/menus/edit',$data);
	}
	//-------------------------end menus------------------------------//
	
	/**
	 * cache
	 */
	public function cache(){
		$data = array();
		$this->_check_permit();
		$this->_template('systemset/cache',$data);
	}
	public function postcache(){
		$this->_check_permit();
		$cache = $this->input->post('cache');
		if ($cache AND is_array($cache))
		{
			update_cache($cache);
		}
		$this->_message("缓存更新成功！", '', TRUE);
	}
	//-------------------------end cache------------------------------//
	
}