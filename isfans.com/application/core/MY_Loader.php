<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Loader extends CI_Loader
 */
class My_Loader extends CI_Loader{
	public function  __construct(){
		parent::__construct();
	}
	
	/**
	 * 切换视图
	 */
	public function switch_theme($theme = 'default'){
		$this->_ci_view_paths = array('themes/' . $theme . '/'	=> TRUE);
	}
	
}