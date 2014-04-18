<?php
/**
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-09
 */
class Author extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper(array('file','url','cookie'));
		$this->load->library(array('session','parser','email','image_lib','phpmail','user_agent','pagination','calendar'));
		$this->load->model(array(''));
		$data = '';
		$this->data['header'] = $this->load->view('global/header',$data,true);
		$this->data['footer'] = $this->load->view('global/footer',$data,true);
	}
	function index(){
		$this->load->view('author/index',$this->data);
	}
}