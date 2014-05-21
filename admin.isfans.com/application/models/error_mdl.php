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
	/**
	 * system setting
	 */
	public function systemsetError(){
		$array = array(
			'MN_Parent' => '请选择父类！',
			'MN_Menuname' => '菜单名称不为空！',
			'MN_Methodname' => '控制器不为空！',
			'MN_Classname' => '页面不为空！',
			'MN_Level' => '等级为数字！'
		);
		return $array;
	}
	//---------------------------end system setting-------------------------//
	
	/**
	 * admin pannel
	 */
	public function adminError(){
		$array = array(
			'admin_usernamenull'=>'请填写用户名！',
			'admin_usernameformat'=>'用户名为字母或数字',
			'admin_emailnull'=>'请填写Email！',
			'admin_emailformat'=>'请填写正确的Email!',
			'admin_passwordnull'=>'请填写密码！',
			'admin_repassword'=>'两次密码不一致！',
			'admin_role'=>'请选择角色！'
		);
		return $array;
	}
	//---------------------------end admin pannel-------------------------//
}