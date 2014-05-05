<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户操作模型
 *
 */
class Adminuser_mdl extends CI_Model
{
	
	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
	public function __construct()
	{
		parent::__construct();	
	}
	
	// ------------------------------------------------------------------------

    /**
     * 根据用户名或者用户UID称获取该用户完整的信息
     *
     * @access  public
     * @param   mixed
     * @return  object
     */
	public function get_full_user_by_username($username = '', $type = 'username')
	{
		$table_admins = $this->db_setting->dbprefix('admins');
		$table_roles = $this->db_setting->dbprefix('roles');
		if ($type == 'uid')
		{
			$this->db_setting->where($table_admins . '.uid', $username);
		}
		else
		{
			$this->db_setting->where($table_admins . '.username', $username);
		}
		return $this->db_setting->select("$table_admins.uid, $table_admins.username, $table_admins.password, $table_admins.salt, $table_admins.role, $table_roles.name, $table_admins.status")
							  ->from($table_admins)
							  ->join($table_roles, "$table_roles.id = $table_admins.role")
							  ->get()
							  ->row();
	}
	
	// ------------------------------------------------------------------------

    /**
     * 根据用户ID获取用户信息
     *
     * @access  public
     * @param   int
     * @return  object
     */
	public function get_user_by_uid($uid = 0)
	{
		return $this->db_setting->where('uid', $uid)->get($this->db_setting->dbprefix('admins'))->row();
	}

	// ------------------------------------------------------------------------

    /**
     * 根据用户名获取用户信息
     *
     * @access  public
     * @param   string
     * @return  object
     */
	public function get_user_by_name($name)
	{
		return $this->db_setting->where('username', $name)->get($this->db_setting->dbprefix('admins'))->row();
	}
	
	// ------------------------------------------------------------------------

    /**
     * 用户自己密码
     *
     * @access  public
     * @return  bool
     */
	public function update_user_password()
	{
		$data['password'] = $this->input->post('new_pass', TRUE);
		$data['salt'] = substr(sha1(time()), -10);
		$data['password'] = sha1($data['password'].$data['salt']);
		return $this->db_setting->where('uid', $this->session->userdata('uid'))->update($this->db_setting->dbprefix('admins'), $data);		
	}

	// ------------------------------------------------------------------------

    /**
     * 获取用户组列表
     *
     * @access  public
     * @return  object
     */
	public function get_roles()
	{
		$roles = array();
		foreach ($this->db_setting->select('id, name')->where('id <>', 1)->get($this->db_setting->dbprefix('roles'))->result_array() as $v)
		{
			$roles[$v['id']] = $v['name'];	
		}
		return $roles;
	}

	// ------------------------------------------------------------------------

    /**
     * 获取用户数
     *
     * @access  public
     * @param   int
     * @return  int
     */
	public function get_users_num($role_id = 0)
	{
		$this->db_setting->where('uid <>', 1);
		if ($role_id)
		{
			$this->db_setting->where('role', $role_id);
		}
		return $this->db_setting->count_all_results($this->db_setting->dbprefix('admins'));
	}

	// ------------------------------------------------------------------------

    /**
     * 获取某个用户组下所有用户
     *
     * @access  public
     * @param   int
     * @param   int
     * @param   int
     * @return  object
     */
	public function get_users($role_id = 0, $limit = 0, $offset = 0)
	{
		$table_admins = $this->db_setting->dbprefix('admins');
		$table_roles = $this->db_setting->dbprefix('roles');
		$this->db_setting->where("$table_admins.uid <>", 1);
		if ($role_id)
		{
			$this->db_setting->where("$table_admins.role", $role_id);
		}
		if ($limit)
		{
			$this->db_setting->limit($limit);
		}
		if ($offset)
		{
			$this->db_setting->offset($offset);
		}
		return $this->db_setting->from($table_admins)
						->join($table_roles, "$table_roles.id = $table_admins.role")
						->get()
						->result();
	}
	
	// ------------------------------------------------------------------------

    /**
     * 添加用户
     *
     * @access  public
     * @param   array
     * @return  bool
     */
	public function add_user($data)
	{
		$data['salt'] = substr(sha1(time()), -10);
		$data['password'] = sha1($data['password'].$data['salt']);
		return $this->db_setting->insert($this->db_setting->dbprefix('admins'), $data);
	}
	
	// ------------------------------------------------------------------------

    /**
     * 修改用户
     *
     * @access  public
     * @param   int
     * @param   array
     * @return  bool
     */
	public function edit_user($uid, $data)
	{
		if (isset($data['password']))
		{
			$data['salt'] = substr(sha1(time()), -10);
			$data['password'] = sha1($data['password'].$data['salt']);
		}
		return $this->db_setting->where('uid', $uid)->update($this->db_setting->dbprefix('admins'), $data);	
	}
	
	// ------------------------------------------------------------------------

    /**
     * 删除用户
     *
     * @access  public
     * @param   uid
     * @return  bool
     */
	public function del_user($uid)
	{
		return $this->db_setting->where('uid', $uid)->delete($this->db_setting->dbprefix('admins'));
	}

	// ------------------------------------------------------------------------
	//get session
	function dogwin_check_session(){
		$S_username = $this->session->userdata('username');
		$S_password = $this->session->userdata('password');
		//echo "sslslslsls".$S_username;
		if($S_username==""||$S_password==""){
			return false;
		}else{
			$cachekey = 'dogwin_check_session_'.$S_username;
			$data	= $this->cache->get($cachekey);
			if( FALSE!==$data && TRUE!=$force_refresh ) {
				return $data;
			}
			$CI = & get_instance();
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
		//echo "S_username==>".$S_username;
		//echo "<BR>S_password==>".$S_password;
	}
}

/* End of file user_mdl.php */
/* Location: ./shared/models/user_mdl.php */