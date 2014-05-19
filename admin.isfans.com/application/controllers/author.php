<?php
class Author extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library(array('session','phpmail'));
		$this->settings->load('backend');
		$this->load->switch_theme(setting('backend_theme'));
		$this->load->model(array('author_mdl','auth_mdl'));
		$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
	}
	function index(){
		$data = array();
		$info = $this->author_mdl->get_user_info_by_id(1,TRUE);
		echo "<pre>";
		print_r($info);
		//$this->_template('login',$data);
		//$in = $this->author_mdl->get_cache(2);
		//print_r($in);
		//var_dump($this->cache->cache_info());
		print_r($this->auth_mdl->dogwin_check_session());
	}
	function login(){
		$this->load->view('author/login');
	}
	function sendem(){
		$data = array();
		$body = $this->load->view('edm',$data,true);
		//echo $body;
		//$this->phpmail->send_email('weblsfamily@gmail.com','weblsfamily@gmail.com','email test',$body,'Darren.Miao');
		$this->phpmail->send_email('80178608@qq.com','weblsfamily@gmail.com','email test', $body,'Darren.Miao');
	}
	function get(){
		$myt = $_POST['myt'];
		echo $myt;
	}
}