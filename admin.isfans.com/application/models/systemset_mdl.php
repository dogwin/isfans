<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 系统管理
 */
class Systemset_mdl extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->wdb = $this->load->database('wdb', TRUE);
		$this->rdb = $this->load->database('rdb', TRUE);
	}
	/**
	 * menus 
	 */
	public function get_menus_num($word=array()){
		if(!empty($word)){
			if(isset($word['keyword'])&&!empty($word['keyword'])){
				$this->rdb->like('name',$word['keyword']);
			}
		}
		return $this->rdb->count_all_results($this->db->dbprefix('menus'));
	}
	public function get_menus($limit = 0, $offset = 0, $word = array()){
		$table = $this->db->dbprefix('menus');
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
				$this->db->like('name',$word['keyword']);
			}
		}
		return $this->db->from($table)
		->order_by('menu_parent','ASC')
		->get()
		->result();
	}
	public function get_menu_by_id($id = 0, $force_refresh=FALSE){
		$id	= intval($id);
		if( 0 == $id ) {
			return FALSE;
		}
		$cachekey	= 'get_menu_by_id_'.$id;
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$sql = 'SELECT * FROM isfans_menus WHERE menu_id="'.$id.'" LIMIT 1';
		$query	= $this->db->query($sql, FALSE);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	//menus array 
	public function get_parent_menus_Arr($force_refresh=FALSE){
		$menuArr = array();
		$cachekey	= 'get_parent_menus_Arr';
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$table = $this->db->dbprefix('menus');
		$result = $this->db->from($table)
		->where('parent_id',0)
		->get()
		->result();
		foreach ($result as $row){
			$menuArr[$row->id] = $row->title;
		}
		if(count($menuArr)){
			$this->cache->save($cachekey,$menuArr,3000);
			return $menuArr;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	//-----------------------------end menus-----------------------------//
}