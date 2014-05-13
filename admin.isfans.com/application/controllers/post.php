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
		$this->load->library(array('session'));
		$this->load->model(array('auth_mdl'));
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
	function login_test(){
		print_r($this->auth_mdl->user_login('admin','eg2014'));
	}
	function s(){
		print_r($this->auth_mdl->dogwin_check_session());
	}
}