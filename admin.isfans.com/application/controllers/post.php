<?php
/**
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-4-16
 */
class Post extends CI_Controller{
	function __construct(){
		$this->load->helper(array('file','url','cookie'));
		$this->load->library(array('session','parser','email','image_lib','phpmail','user_agent','pagination','calendar'));
		$this->load->model(array('auth_mdl','error_mdl'));
	}
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->auth_mdl->user_login($email,$password)){
			$array = array(
					'flag'=>true
				);
		}else{
			$array = array(
					'flag'=>false,
					'msg'=>'登陆'
				);
		}
	}
}