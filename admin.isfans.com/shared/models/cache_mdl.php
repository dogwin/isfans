<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 缓存操作模型
 *
 */
class Cache_mdl extends CI_Model
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
		$this->wdb = $this->load->database('wdb', TRUE);
		$this->rdb = $this->load->database('rdb', TRUE);
	}

	// ------------------------------------------------------------------------

    /**
     * 判断是否存在对应文件夹，若不存在则创建
     *
     * 仅对本地环境有效
     *
     * @access  private
     * @param   string
     * @return  void
     */
    private function _create_folder($folder = '')
    {
    	if ($this->platform->get_type() == 'default')
    	{
    		if ( ! file_exists(HC_JY_SHARE_PATH . 'settings/' . $folder))
	    	{
	    		mkdir(HC_JY_SHARE_PATH . 'settings/' . $folder);
	    	}
    	}
    	
    }
	
	// ------------------------------------------------------------------------

    /**
     * 更新菜单缓存
     *
     * @access  public
     * @return  void
     */
	public function update_menu_cache()
	{
		$table_menu = $this->rdb->dbprefix('menus');
		$level_1_menus = $this->rdb->select('menu_id, class_name, method_name, menu_name, menu_parent')
								  ->where('menu_level', 0) 
								  ->where('menu_parent', 0)
								  ->get($table_menu)
								  ->result_array();
		foreach ($level_1_menus as & $i)
		{
			$level_2_menus = $this->rdb->select('menu_id, class_name, method_name, menu_name, menu_parent')
									  ->where('menu_level', 1)
									  ->where('menu_parent', $i['menu_id'])
									  ->get($table_menu)
									  ->result_array();
			foreach ($level_2_menus as & $j)
			{
				
				$level_3_menus = $this->rdb->select('menu_id, class_name, method_name, menu_name, menu_parent')
											  ->where('menu_level', 2)
											  ->where('menu_parent', $j['menu_id'])
											  ->get($table_menu)
											  ->result_array();
				
				$j['sub_menus'] = $level_3_menus;
			}
			$i['sub_menus'] = $level_2_menus;
		}
		$this->platform->cache_write(HC_JY_SHARE_PATH . 'settings/menus.php', 
									 array_to_cache("setting['menus']", $level_1_menus));
	}
	
	// ------------------------------------------------------------------------

    /**
     * 更新用户组缓存
     *
     * @access  public
     * @param   string
     * @return  void
     */
	public function update_role_cache($target = '')
	{
		if ($target)
		{
			$target = is_array($target) ? $target : array($target);
			$this->rdb->where_in('id', $target);
		}
		$roles = $this->rdb->get($this->rdb->dbprefix('roles'))->result_array();
		foreach ($roles as & $role)
		{	
			$role['rights'] = explode(',', $role['rights']);
			$rights = $this->rdb->select('right_class, right_method, right_detail')
							   ->where_in('right_id', $role['rights'])
							   ->get($this->rdb->dbprefix('rights'))
							   ->result();
			$role['rights'] = array();
			foreach ($rights as $right)
			{
				$role['rights'][] = $right->right_class . '@' . $right->right_method . ($right->right_detail ? '@' . $right->right_detail : ''); 	
			}
			$this->_create_folder('acl');
			$this->platform->cache_write(HC_JY_SHARE_PATH . 'settings/acl/role_' . $role['id'] . '.php', 
										 array_to_cache("setting['current_role']",$role));
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 更新站点信息缓存
     *
     * @access  public
     * @return  void
     */
	public function update_site_cache()
	{
		$data = $this->rdb->get($this->rdb->dbprefix('site_settings'))->row_array();
		$this->platform->cache_write(HC_JY_SHARE_PATH . 'settings/site.php', 
									 array_to_cache("setting", $data));	
	}
	
	// ------------------------------------------------------------------------

    /**
     * 更新后台设置缓存
     *
     * @access  public
     * @return  void
     */
	public function update_backend_cache()
	{
		$data = $this->rdb->get($this->rdb->dbprefix('backend_settings'))->row_array();
		$this->platform->cache_write(HC_JY_SHARE_PATH . 'settings/backend.php', 
									 array_to_cache("setting", $data));	
	}
	
	// ------------------------------------------------------------------------

    /**
     * 更新后台设置缓存
     *
     * @access  public
     * @return  void
     */
	public function update_data_cache()
	{
		$ci = &get_instance();
		$ci->cache->clean();
		
	}
	
	// ------------------------------------------------------------------------
	
}

/* End of file cache_mdl.php */
/* Location: ./shared/models/cache_mdl.php */