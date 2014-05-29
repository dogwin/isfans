<?php
/**
 * Buddha 佛像管理
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-05-29
 */
class Buddha extends Admin_Controller{
	function __construct(){
		parent::__construct();
		$this->_check_permit();
		$this->load->model(array('auth_mdl','systemset_mdl','admin_mdl'));
	}
	function index(){
		$data = array();
		
		$this->_template('model/buddha/index',$data);
	}
}