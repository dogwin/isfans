<?php
class Author extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->settings->load('backend');
		$this->load->switch_theme(setting('backend_theme'));
		$this->load->model('author_mdl');
	}
	function index(){
		$data = array();
		$info = $this->author_mdl->get_user_info_by_id(2);
		echo "<pre>";
		print_r($info);
		//$this->_template('login',$data);
		$in = $this->author_mdl->get_cache(2);
		print_r($in);
		var_dump($this->cache->cache_info());
	}
	function login(){
		$this->load->view('author/login');
	}
}