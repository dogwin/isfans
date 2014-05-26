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
		$table = $this->rdb->dbprefix('administrator');
		if ($limit)
		{
			$this->rdb->limit($limit);
		}
		if ($offset)
		{
			$this->rdb->offset($offset);
		}
		if(!empty($word)){
			if(isset($word['keyword'])&&!empty($word['keyword'])){
				$this->rdb->like('username',$word['keyword']);
			}
		}
		return $this->rdb->from($table)
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
		$sql = 'SELECT * FROM isfans_administrator WHERE id="'.$id.'" LIMIT 1';
		$query	= $this->rdb->query($sql, FALSE);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	//get role arr 
	public function get_role_arr($force_refresh=FALSE){
		$roleArr = array();
		$cachekey	= 'get_role_arr';
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$table = $this->rdb->dbprefix('roles');
		$result = $this->rdb->from($table)
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
	//check username
	public function get_admin_by_name($username,$id=0,$force_refresh=FALSE){
		
		$cachekey	= 'get_admin_by_name_'.$username;
		
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$sql = 'SELECT * FROM isfans_administrator WHERE username="'.$username.'"';
		if($id){
			$sql .=" and id!='$id'";
		}
		$sql.=' LIMIT 1';
		
		$query	= $this->rdb->query($sql, FALSE);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		//$this->cache->delete($cachekey);
		return FALSE;
	}
	//get role by id 
	function get_role_by_id($id,$force_refresh=FALSE){
		$table = 
		$id	= intval($id);
		if( 0 == $id ) {
			return FALSE;
		}
		$cachekey	= 'get_role_by_id_'.$id;
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		$sql = 'SELECT * FROM isfans_roles WHERE id="'.$id.'" LIMIT 1';
		$query	= $this->rdb->query($sql, FALSE);
		if($obj = $query->row()) {
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
	//update 
	/**
	 * role list
	 */
	public function get_role_num(){
		
		return $this->rdb->count_all_results($this->db->dbprefix('roles'));
	}
	
	public function get_roles($limit = 0, $offset = 0){
		$table = $this->rdb->dbprefix('roles');
		if ($limit)
		{
			$this->rdb->limit($limit);
		}
		if ($offset)
		{
			$this->rdb->offset($offset);
		}
		return $this->rdb->from($table)
		->get()
		->result();
	}
	/**
	 * 获取表单数据
	 *
	 * @access  public
	 * @return  array
	 */
	public function get_form_data()
	{	
		$table = $this->rdb->dbprefix('rights');
		$sql = "SELECT right_id,right_name FROM ".$table;
		$query = $this->db->query($sql);
		$roles = $query->result();
		$data['rights'] = $this->_re_parse_array($roles, 'right_id', 'right_name');
	
		return $data;
	}
	
	// ------------------------------------------------------------------------
	/**
	 * 格式化数组成ASSOC方式
	 *
	 * @access  private
	 * @param   array
	 * @param   string
	 * @param   string
	 * @return  array
	 */
	private function _re_parse_array($array, $key, $value)
	{
		$data = array();
		foreach ($array as $v)
		{
			$data[$v->$key] = $v->$value;
		}
		return $data;
	}
	
	// ------------------------------------------------------------------------
	
	//-----------------end role list--------------//
	
	
	/**
	 * base function
	 */
	//insert
	public function insert($tb,$data){
		$tb = $this->rdb->dbprefix($tb);
		$this->wdb->insert($tb,$data);
		return $this->wdb->insert_id();
	}
	//update
	public function update($tb,$data,$wh){
		$tb = $this->rdb->dbprefix($tb);
		return $this->wdb->update($tb,$data,$wh);
	}
	//delete
	public function delete($tb,$wh){
		$tb = $this->rdb->dbprefix($tb);
		return $this->wdb->delete($tb,$wh);
	}
}