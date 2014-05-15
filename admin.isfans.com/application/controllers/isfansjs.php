<?php
/**
 * js class
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-29
 */
class Isfansjs extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('error_mdl'));
		$this->load->library('session');
		$this->settings->load('backend');
		$this->load->switch_theme(setting('backend_theme'));
	}
	/**
	 * author
	 */
	public function author(){
		$this->data['error'] = $this->error_mdl->authorError();
		$this->load->view('js/author',$this->data);
	}
	 
	// ---------------------------------------------------------------------
	
	public function systemset(){
		$data['error'] = $this->error_mdl->systemsetError();
		$this->load->view('js/systemset',$data);
	}
}