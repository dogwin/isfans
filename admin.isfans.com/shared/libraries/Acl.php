<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台权限控制类
 *
 */
class Acl 
{
	/**
     * ci
     * CI超级类句柄
     *
     * @var object
     * @access  private
     **/
	private $ci = NULL;

	/**
     * top_menus
     * 一级菜单集合
     *
     * @var array
     * @access  private
     **/
	private $top_menus = array();

	/**
     * _left_menus
     * 二三级菜单集合
     *
     * @var array
     * @access  private
     **/
	private $left_menus = array();

	/**
     * _current_menu
     * 当前所在的菜单的下标
     *
     * @var int
     * @access  private
     **/
	private $_current_menu = -1;

	/**
     * _default_link
     * 当前所在的链接
     *
     * @var string
     * @access  public
     **/
	public $_default_link = '';

	/**
     * _rights
     * 权限集合
     *
     * @var array
     * @access  public
     **/
	public $rights = array();
	
	private $class_name = '';
	
	private $method_name = '';
	
	private $method_names = array();
	
	public $top_url = '';

	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
	public function __construct()
	{
		$this->ci = & get_instance();
		$this->ci->settings->load('menus');//加载菜单数据
		$this->top_menus = & setting('menus');
		if ($this->ci->_admin->role != 1)
		{
			$this->ci->settings->load('acl/role_' . $this->ci->_admin->role . '.php');//加载权限数据
			$this->top_menus = & setting('menus');
			$this->rights = & setting('current_role');
		}
		$this->top_menus = & setting('menus');
		$this->rights = & setting('current_role');
		$this->_filter_menus();
	}
	
	
	// ------------------------------------------------------------------------

    /**
     * 输出左侧菜单
     *
     * @access  public
     * @return  void
     */
	public function show_left_menus()
	{
		//print_r($this->left_menus);exit;
		foreach ($this->left_menus as $key => $v)
		{
			
			if($v['menu_id']<4) continue;
			if ($v['sub_menus'])
			{
				//$method = 
				$classname = '';
				$are = '';
				if(isset($v['current']) && $v['current']) {
					$classname = ' active';
					$are = '<span class="selected"></span>
					<span class="arrow open"></span>';
				}else{
					$are = '<span class="arrow"></span>';
				}
				echo '<li class="' . $classname .'"><a href="javascript:;">
						<i class="icon-th"></i> <span class="title">' . $v['menu_name'] . '</span>'.$are.'</a>
						<ul class="sub-menu">';
						
						 foreach ($v['sub_menus'] as $j)
						 {
						   $extra = '';
						   $this->_current_menu ==  1 AND $extra =  'model=' . $j['extra'] ;
						   if ($this->_current_menu ==  2) {
						        echo '<li class="' . (isset($j['current']) ? 'active' : '') .'"><a href="' . 
						   	        plugin_url($key, $j['class_name'], $j['method_name']) . '">' . $j['menu_name'] . '</a></li>';
						   	    continue;
						   } 
						   echo '<li class="' . (isset($j['current']) ? 'active' : '') .'"><a href="' . 
						   	 base_url($j['class_name'] . '/' . $j['method_name'], $extra) . '">' . $j['menu_name'] . '</a></li>';
						 }
				echo	 '</ul>
				      </li>';	
			}
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 过滤菜单
     *
     * @access  private
     * @return  void
     */
	private function _filter_menus()
	{
		$class_name = $this->ci->uri->rsegment(1);
		$method_name = $this->ci->uri->rsegment(2);
		$this->class_name = $class_name;
		$this->method_name = $method_name;
		switch ($class_name)
		{
			case 'content' : 
			case 'category_content' : 
						$this->_filter_content_menus($class_name, $method_name);
						break;
			case 'module' : 
						$this->_filter_module_menus($class_name, $method_name);
						break;
			case 'system' :
			case 'setting':
			case 'model'  :
			case 'category' :
			case 'plugin' :
			case 'role'   :
			case 'user'   :
			case 'post_report' :
			case 'member' :
			case 'member_enter' :
						$this->method_names['member_enter']=array('active','examine');
            case 'database' :
			default : 
						$this->_filter_normal_menus($class_name, $method_name);
						break;
						 //noting to do
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 过滤系统菜单
     *
     * @access  private
     * @param   string
     * @param   string
     * @return  void
     */
	private function _filter_normal_menus($class_name, $method_name, $default_uri = 'systemset/index', $current_menu = 0, $folder = '')
	{//0
		$this->_current_menu = $current_menu;
		$this->_default_link = backend_url($default_uri);
		$this->left_menus = & $this->top_menus[$this->_current_menu]['sub_menus'];
		
		foreach ($this->left_menus as $vkey => & $v)
		{
			foreach ($v['sub_menus'] as $jkey => & $j)
			{
				//if ($j['class_name'] == $folder . $class_name AND ($j['method_name'] == $method_name || $method_name=='add' || $method_name=='edit' || $method_name=='show'))
				if ($j['class_name'] == $folder . $class_name AND ($j['method_name'] == $method_name ||$method_name == $j['method_name']."_edit"))
				{
					$j['current'] = TRUE;
					$v['current'] = TRUE;
				}elseif($j['class_name']==$class_name && isset($this->method_names[$class_name])){
					if(in_array($method_name, $this->method_names[$class_name])){
						$j['current'] = TRUE;
						$v['current'] = TRUE;
					}
				}
				if ($this->ci->_admin->role == 1)
				{
					continue;
				}
				$right = $j['class_name'] . '@' . $j['method_name'];
				if ( ! in_array($right, $this->rights['rights']) AND $right !='system@home')
				{
					unset($this->left_menus[$vkey]['sub_menus'][$jkey]);	
				}
			} 
			if ( ! $v['sub_menus'])
			{
				unset($this->left_menus[$vkey]);
			}  
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 过滤模型菜单
     *
     * @access  private
     * @param   string
     * @param   string
     * @return  void
     */
	private function _filter_content_menus($class_name, $method_name)
	{//1
		$this->_current_menu = 1;
		$this->left_menus = & $this->top_menus[$this->_current_menu]['sub_menus'];
		$extra = $this->ci->input->get('model');
		foreach ($this->left_menus as $vkey => & $v)
		{
			foreach ($v['sub_menus'] as $jkey => & $j)
			{
				if ($j['class_name'] == $class_name AND ($j['method_name'] == $method_name || $method_name=='add' || $method_name=='edit') AND 
					( ($j['extra'] == $extra AND $vkey == 0) || ($j['extra'] == $extra AND $vkey == 1) ) )
				{
					$j['current'] = TRUE;
					$v['current'] = TRUE;
					$this->top_url .= ' <a >' . $j['menu_name'] . '</a>';
				}
				
				if ($this->ci->_admin->role == 1)
				{
					continue;
				}
				$right = $j['class_name'] . '@' . $j['method_name'];
				if ( ! in_array($right, $this->rights['rights']) || 
				   ( ! in_array($j['extra'], $this->rights['models']) AND $vkey == 0) ||
				   ( ! in_array($j['extra'], $this->rights['category_models']) AND $vkey == 1) 		
				)
				{
					unset($this->left_menus[$vkey]['sub_menus'][$jkey]);
				}
			} 
			if ( ! $v['sub_menus'])
			{
				unset($this->left_menus[$vkey]);
			}
		}
		//设定默认链接 
		if ($_item = @ reset($this->left_menus[0]['sub_menus']))
		{
		    if ( ! $this->_default_link)
			{
			    $this->_default_link = backend_url($_item['class_name'] . '/view', 'model=' . $_item['extra']);	
			}
		}
		
	}
	
	// ------------------------------------------------------------------------

    /**
     * 过滤插件菜单
     *
     * @access  private
     * @param   string
     * @param   string
     * @return  void
     */
	private function _filter_module_menus($class_name, $method_name)
	{//2
		$this->_current_menu = 2;
	}
	
	// ------------------------------------------------------------------------

    /**
     * 检测插件
     *
     * @access  public
     * @param   string
     * @return  void
     */
	public function permit($act = '', $folder = '')
	{
		if ($this->ci->_admin->role == 1)
		{
			return TRUE;	
		}
		$class_method = $folder . $this->ci->uri->rsegment(1) . '@' . $this->ci->uri->rsegment(2) . ($act ? '@' . $act : '');
		if ( ! in_array($class_method,$this->rights['rights']))
		{
			return FALSE;	
		}
		return TRUE;
	}

	// ------------------------------------------------------------------------

    /**
     * 设置顶部选中菜单
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function set_current_menu($key = 0)
	{
		$this->_current_menu = $key;
	}

	// ------------------------------------------------------------------------

	/**
     * 触发自定义菜单的检测
     *
     * @access  public
     * @param   int
     * @return  void
     */
	public function filter_left_menus($default_uri = '', $current_menu = 0, $folder = '')
	{
		$current_menu AND $this->_current_menu = $current_menu;
		$class_name = $this->ci->uri->rsegment(1);
		$method_name = $this->ci->uri->rsegment(2);
		$this->_filter_normal_menus($class_name, $method_name, $default_uri, $this->_current_menu, $folder);
	}

	// ------------------------------------------------------------------------
	
}
	
/* End of file Acl.php */
/* Location: ./shared/libraries/Acl.php */