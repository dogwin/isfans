<?php
/**
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-09
 */
class Isfans extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('file','url','cookie'));
		$this->load->library(array('session','parser','email','image_lib','phpmail','user_agent','pagination','calendar'));
		$this->load->model(array(''));
	}
	function index(){
		echo "<img src='".base_url('images/pic_celebrate01')."'/>";
	}
}