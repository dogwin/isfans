<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 用户组操作模型
 *
 */
class Role_mdl extends CI_Model
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
     * 获取出ROOT以外的所有用户组
     *
     * @access  public
     * @return  object
     */
	public function get_roles($limit = 0, $offset = 0)
	{
		$table_user = $this->db->dbprefix('roles');
		if ($limit)
		{
			$this->db->limit($limit);
		}
		if ($offset)
		{
			$this->db->offset($offset);
		}
		return $this->db->from($table_user)
						->where('id <>', '1')
						->order_by('id','desc')
						->get()
						->result();
			
	}

	// ------------------------------------------------------------------------

    /**
     * 获取角色数量
     *
     * @access  public
     * @param   int
     * @return  int
     */
	public function get_roles_num() {
		
		return $this->db->count_all_results($this->db->dbprefix('roles'));
	}
	
	// ------------------------------------------------------------------------

    /**
     * 根据用户组ID获取用户信息
     *
     * @access  public
     * @param   int
     * @return  object
     */
	public function get_role_by_id($id)
	{
		return $this->db_setting->where('id', $id)->get($this->db_setting->dbprefix('roles'))->row();	
	}
	
	// ------------------------------------------------------------------------

    /**
     * 根据用户组名称获取用户组信息
     *
     * @access  public
     * @param   string
     * @return  object
     */
	public function get_role_by_name($name)
	{
		return $this->db_setting->where('name', $name)->get($this->db_setting->dbprefix('roles'))->row();	
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

    /**
     * 获取表单数据
     *
     * @access  public
     * @return  array
     */
	public function get_form_data()
	{
		$data['rights'] = $this->_re_parse_array($this->db_setting->select('right_id,right_name')->get($this->db_setting->dbprefix('rights'))->result(), 'right_id', 'right_name');	
		
		return $data;
	}
	
	// ------------------------------------------------------------------------

    /**
     * 添加用户组
     *
     * @access  public
     * @param   array
     * @return  int
     */
	public function add_role($data)
	{
		$this->db_setting->insert($this->db_setting->dbprefix('roles'), $data);
		return $this->db_setting->insert_id();
	}
	
	// ------------------------------------------------------------------------

    /**
     * 修改用户组
     *
     * @access  public
     * @param   int
     * @param   array
     * @return  bool
     */
	public function edit_role($id, $data)
	{
		return $this->db_setting->where('id', $id)->update($this->db_setting->dbprefix('roles'), $data);
	}
	
	// ------------------------------------------------------------------------

    /**
     * 获取用户组下用户数目
     *
     * @access  public
     * @param   int
     * @return  int
     */
	public function get_role_user_num($id)
	{
		return $this->db_setting->where('role', $id)->count_all_results($this->db_setting->dbprefix('admins'));
	}
	
	// ------------------------------------------------------------------------

    /**
     * 删除用户组
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function del_role($id)
	{
		$this->db_setting->where('id', $id)->delete($this->db_setting->dbprefix('roles'));	
		$this->platform->cache_delete(HC_JY_SHARE_PATH . 'settings/acl/role_' . $id . '.php');	
	}

	// ------------------------------------------------------------------------

}

/* End of file role_mdl.php */
/* Location: ./shared/models/role_mdl.php */