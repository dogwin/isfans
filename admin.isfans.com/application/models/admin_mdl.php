<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 管理员管理 
 */
class Admin_mdl extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->wdb = $this->load->database('wdb', TRUE);
		$this->rdb = $this->load->database('rdb', TRUE);
	}
	/**
	 * admin list
	 */
	public function get_admin_num($word=array()){
		if(!empty($word)){
			if(isset($word['keyword'])&&!empty($word['keyword'])){
				$this->rdb->like('username',$word['keyword']);
			}
		}
		return $this->rdb->count_all_results($this->db->dbprefix('administrator'));
	}
	
	public function get_admin($limit = 0, $offset = 0, $word = array()){
		$table = $this->db->dbprefix('administrator');
		if ($limit)
		{
			$this->db->limit($limit);
		}
		if ($offset)
		{
			$this->db->offset($offset);
		}
		if(!empty($word)){
			if(isset($word['keyword'])&&!empty($word['keyword'])){
				$this->db->like('username',$word['keyword']);
			}
		}
		return $this->db->from($table)
		->get()
		->result();
	}
	//get admin by id 
	public function get_admin_by_id($id,$force_refresh=FALSE){
		$id	= intval($id);
		if( 0 == $id ) {
			return FALSE;
		}
		$cachekey	= 'get_admin_by_id_'.$id;
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$sql = 'SELECT * FROM isfans_administrator WHERE menu_id="'.$id.'" LIMIT 1';
		$query	= $this->db->query($sql, FALSE);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	//get role arr 
	public function get_role_arr(){
		$roleArr = array();
		$cachekey	= 'get_role_arr';
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$table = $this->db->dbprefix('roles');
		$result = $this->db->from($table)
		->get()
		->result();
		foreach ($result as $row){
			$roleArr[$row->id] = $row->name;
		}
		if(count($roleArr)){
			$this->cache->save($cachekey,$roleArr,3000);
			return $roleArr;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
}