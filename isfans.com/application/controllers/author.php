<?php
/**
 * @author dogwin
 * @website http://isfans.com
 * @date 2014-04-09
 */
class Author extends Isfans{
	function __construct(){
		parent::__construct();
	}
	function index(){
		echo "rr";
	}
	function demo(){
		$u = file_get_contents('http://rlsy.net');
		echo $u;
	}
}