<?php
/**
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-16
 */
class Isfansjs extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('file','url','cookie'));
		$this->load->library(array('session','parser','email','image_lib','phpmail','user_agent','pagination','calendar'));
		$this->load->model(array('error_mdl'));
	}
	function login(){
		$this->data['loginError'] = $this->error_mdl->loginError();
		$this->load->view('js/login',$this->data);
	}
}