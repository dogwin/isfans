<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * isfans.com 控制器
 */
abstract class Isfans extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
		$this->load->helper(array('file','url','cookie'));
		$this->load->library(array('session','parser','email','image_lib','phpmail','user_agent'));
		
		$this->load->switch_theme();
	}
}
