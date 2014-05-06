<?php
/**
 * post 
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-29
 */
class Post extends Admin_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('post_mdl','auth_mdl'));
	}
	function login(){
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		
		if($this->auth_mdl->user_login($username,$password)){
			$array = array('flag'=>true,'redirect'=>base_url('systemset/index'));
		}else{
			$array = array('flag'=>false);
		}
		echo json_encode($array);
	}
	function login_test(){
		print_r($this->auth_mdl->user_login('admin','eg2014'));
	}
}