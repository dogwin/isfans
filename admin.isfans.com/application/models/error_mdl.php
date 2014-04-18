<?php
/**
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-16
 */
class Error_mdl extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//login error
	function loginError(){
		$array = array(
				'usernameNull'=>'请输入用户名',
				'passwordNull'=>'请输入密码'
			);
		return $array;
	}
	
}