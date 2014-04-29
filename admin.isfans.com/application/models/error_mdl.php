<?php
/**
 * Error Model
 * @author dogwin
 * @website http://
 */
class Error_mdl extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->wdb = $this->load->database('wdb', TRUE);
		$this->rdb = $this->load->database('rdb', TRUE);
	}
	/**
	 * Author Error
	 * 
	 */
	public function authorError(){
		$array = array(
			'UN_NULL'=>'请输入用户名',
			'PS_NULL'=>'请输入密码',
			'UP_E'=>'用户名或密码错误'
		);
		return $array;
	}
}