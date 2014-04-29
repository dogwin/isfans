<?php
/**
 * js class
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-29
 */
class Isfansjs extends Admin_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('error_mdl'));
	}
	/**
	 * author
	 */
	public function author(){
		$this->data['error'] = $this->error_mdl->authorError();
		$this->load->view('js/author',$this->data);
	} 
	// ---------------------------------------------------------------------
}