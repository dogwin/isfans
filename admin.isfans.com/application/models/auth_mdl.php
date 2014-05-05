<?php
/**
 * @author dogwin
 * @date 
 */
class Auth_mdl extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database();
		$this->wdb = $this->load->database('wdb', TRUE);
		$this->rdb = $this->load->database('rdb', TRUE);
	}
	/**
	 * rand numbers
	 */
	function dogwin_rand($min = null, $max = null){
		static $seeded;
		if (!isset($seeded)){
			mt_srand((double)microtime()*1000000);
			$seeded = true;
		}
		if (isset($min) && isset($max)){
			if ($min >= $max){
				return $min;
			}else{
				return mt_rand($min, $max);
			}
		}else{
			return mt_rand();
		}
	}
	/**
	 *
	 * password
	 *
	 */
	function dogwin_encrypt_password($plain){
		$password = '';
		for ($i=0; $i<10; $i++) {
			$password .= $this->dogwin_rand();
		}
		$salt = substr(md5($password), 0, 2);
		$password = md5($salt . $plain) . ':' . $salt;
		return $password;
	}
	/**
	 *
	 * decrypt password
	 *
	 */
	function dogwin_decrypt_password($database_ps,$in_ps){
		$A_database_ps = explode(":",$database_ps);
		$new_ps = md5($A_database_ps[1].$in_ps).':'.$A_database_ps[1];
		return $new_ps;
	}
	/**
	 *
	 * set cookie
	 *
	 */
	function dogwin_set_cookie($username,$password){
		$username_len = strlen($username)+19770725;
		$set_value = convert_uuencode($username.$password.":".$username_len);
		$C_value = array(
				"name"=>"C_loginfo",
				"value"=>$set_value,
				"expire"=>'3600',
				"path"=>'/',
		);
		set_cookie($C_value);
	}
	/**
	 *
	 * get cookie
	 *
	 */
	function dogwin_get_cookie(){
		$C_loginfo = convert_uudecode(get_cookie('C_loginfo'));
		if(strlen($C_loginfo)>10){
			$str_name_ps = explode(":",$C_loginfo);
			$name_len = $str_name_ps['2']-19770725;
			$name_password = $str_name_ps[0].":".$str_name_ps[1];
			$C_len = strlen($name_password);
			$username = substr($name_password,0,$name_len);
			$password = substr($name_password,$name_len,$C_len);
			$sql = "select * from isfans_administrator where username=? and password=?";
			$query = $this->db->query($sql,array($username,$password));
			if($query->num_rows()<>0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	/**
	 *
	 * set session
	 *
	 */
	function dogwin_set_session($username,$password){
		$A_S_Log = array(
				"username"=>$username,
				"password"=>$password,
		);
		$this->session->set_userdata($A_S_Log);
	}
	//get session
	function dogwin_check_session($force_refresh=FALSE){
		$S_username = $this->session->userdata('username');
		$S_password = $this->session->userdata('password');
		//echo "sslslslsls".$S_username;
		if(empty($S_username)||empty($S_password)){
			return false;
		}else{
			$cachekey = 'dogwin_check_session_'.$S_username;
			$data	= $this->cache->get($cachekey);
			if( FALSE!==$data && TRUE!=$force_refresh ) {
				return $data;
			}
			//$CI = & get_instance();
			//已登陆验证
			$sql = "select * from isfans_administrator where username=? and password=?";
			$query = $this->db->query($sql,array($S_username,$S_password));
			
			if($obj = $query->row()) {
				$this->cache->save($cachekey,$obj,3000);
				return $obj;
			}
			$this->cache->delete($cachekey);
			return FALSE;
		}
	}
	//userinfo
	function userinfo(){
		$S_username = $this->session->userdata('username');
		$S_password = $this->session->userdata('password');
		//echo "sslslslsls".$S_username;
		if($S_username==""||$S_password==""){
			return false;
		}else{
			//已登陆验证
			$sql = "select * from isfans_administrator where username=? and password=?";
			$query = $this->db->query($sql,array($S_username,$S_password));
			if($query->num_rows()<>0){
				return $query->row();
			}else{
				return false;
			}
		}
	}
	
	/**
	 * user register
	 */
	function user_register($array_data){
		return $this->db->insert('isfans_administrator',$array_data);
	}
	
	/**
	 * user update
	 */
	function user_update($array_data,$username,$password){	
		$up = $this->db->update('isfans_administrator',$array_data,array('username'=>$username,'password'=>$password));
		$this->check_login($username,$password,TRUE);
		return $up;
	}
	/**
	 * user login
	 */
	function user_login($username,$password,$force_refresh=FALSE){
		$sql = "select * from isfans_administrator where username=?";
		$query = $this->db->query($sql,array($username));
		if($query->num_rows()>0){
			$row = $query->row();
			$new_ps = $this->dogwin_decrypt_password($row->password,$password);
			if($row->password==$new_ps){
				$cachekey = 'user_login_'.$username;
				$data	= $this->cache->get($cachekey);
				if( FALSE!==$data && TRUE!=$force_refresh ) {
					return $data;
				}
				$CI = & get_instance();
				if($row){
					$this->cache->save($cachekey,$row,3000);
					$this->dogwin_set_session($username,$new_ps);
					return TRUE;
				}else{
					$this->cache->delete($cachekey);
					return FALSE;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	/**
	 * check login
	 */
	function check_login($username,$password,$force_refresh=FALSE){
		$cachekey = 'check_login_'.$username;
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$CI = & get_instance();
		
		$sql = "select * from isfans_administrator where username='$username' and password='$password'";
		$query = $this->rdb->query($sql);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	//login check
	function isLogged(){
		$CookieFlag = $this->dogwin_get_cookie();
		$SessionFlag = $this->dogwin_check_session();
		if($CookieFlag||$SessionFlag){
			return true;
		}else{
			return false;
		}
	}
}
/*End the file auth_mdl.php*/
/*Location ./application/models/auth_mdl.php*/