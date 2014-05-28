<?php
/**
 * 
 */
class Author_mdl extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->wdb = $this->load->database('wdb', TRUE);
		$this->rdb = $this->load->database('rdb', TRUE);
	}
	//get user info
	function get_user_info_by_id($id=1,$force_refresh=FALSE){
		$id	= intval($id);
		if( 0 == $id ) {
			return FALSE;
		}
		
		$cachekey	= 'get_user_info_by_id_'.$id;
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		//$CI = & get_instance();
		$query	= $this->rdb->query('SELECT * FROM isfans_administrator WHERE id="'.$id.'" LIMIT 1', FALSE);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	function get_cache($id){
		$cachekey	= 'get_user_info_by_id_'.$id;
		$data	= $this->cache->get($cachekey);
		return $data;
	}
	function logout(){
		return $this->session->sess_destroy();
	}
}