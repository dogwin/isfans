<?php
/**
 * post 
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-29
 */
class Post extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('file','url','cookie'));
		$this->load->library(array('session','parser','email','image_lib','phpmail','user_agent'));
		$this->load->model(array('auth_mdl','systemset_mdl'));
		$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
		
	}
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if($this->auth_mdl->user_login($username,$password)){
			$array = array('flag'=>true,'redirect'=>base_url('systemset/index'));
		}else{
			$array = array('flag'=>false);
		}
		echo json_encode($array);
	}
	/**
	 * menus 
	 */
	function menuEdit(){
		$menu_id = $this->input->post('menu_id');
		$page = $this->input->post('page');
		$menu_parent = $this->input->post('menu_parent');
		$menu_name = $this->input->post('menu_name');
		$class_name = $this->input->post('class_name');
		$method_name = $this->input->post('method_name');
		$menu_level = $this->input->post('menu_level');
		$data = array(
				'menu_parent'=>$menu_parent,
				'menu_name'=>$menu_name,
				'class_name'=>$class_name,
				'method_name'=>$method_name,
				'menu_level'=>$menu_level
		);
		if($menu_id){
			//update
			if($this->systemset_mdl->updateMenus('menus',$data,array('menu_id'=>$menu_id),$menu_id)){
				$array = array('flag'=>TRUE,'href'=>base_url('systemset/menus?page='.$page));
			}else{
				$array = array('flag'=>FALSE,'msg'=>'菜单更新失败！');
			}
		}else{
			//insert
			if($this->systemset_mdl->insertMenus('menus',$data)){
				$array = array('flag'=>TRUE,'href'=>base_url('systemset/menus?page='.$page));
			}else{
				$array = array('flag'=>FALSE,'msg'=>'菜单插入失败！');
			}
		}
		echo json_encode($array);
	}
	//-------------------------end menus------------------------------//
}