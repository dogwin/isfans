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
		$this->load->model(array('auth_mdl'));
	}
	public function index(){
		$data = array();
		$this->_template('systemset/index',$data);
	}
}