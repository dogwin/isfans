<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 后台控制器基类
 *
 */		
abstract class Admin_Controller extends CI_Controller
{
	/**
     * _admin
     * 保存当前登录用户的信息
     *
     * @var object
     * @access  public
     **/
	public $_admin = NULL;
	public $_data_hcjf = array();
	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('session','form'));
		$this->settings->load('backend');
		$this->load->model(array('auth_mdl'));
		$this->load->switch_theme(setting('backend_theme'));
		$this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
		$this->_check_login();
		$this->load->library('acl');
	}
		
	// ------------------------------------------------------------------------

	/**
	 * 检查用户是否登录
	 *
	 * @access  protected
	 * @return  void
	 */
	protected function _check_login()
	{
		$this->_admin = $this->auth_mdl->dogwin_check_session();
		//print_r($this->_admin);
		if(!$this->_admin){
			$redirect =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			//unlogged
			redirect(base_url('author/login?redurl='.$redirect));
			exit();
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 加载视图
     *
     * @access  protected
     * @param   string
     * @param   array
     * @return  void
     */
	protected function _template($template, $data = array())
	{
		$data['tpl'] = $template;
		$this->load->view('sys_entry', $data);
	}
	
	// ------------------------------------------------------------------------

    /**
     * 检查权限
     *
     * @access  protected
     * @param   string
     * @return  void
     */
	protected function _check_permit($action = '', $folder = '')
	{
		if ( ! $this->acl->permit($action, $folder))
		{
			$this->_message('对不起，你没有访问这里的权限！', '', FALSE);
		}
	}
	
	// ------------------------------------------------------------------------

    /**
     * 信息提示
     *
     * @access  public
     * @param   string
     * @param   string
     * @param   bool
     * @param   string
     * @return  void
     */
	public function _message($msg, $goto = '', $auto = TRUE, $fix = '', $pause = 3000)
	{
		if($goto == '')
		{
			$goto = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url();
		}
		else
		{
			$goto = strpos($goto, 'http') !== false ? $goto : backend_url($goto);	
		}
		$goto .= $fix;
		$this->_template('sys_message', array('msg' => $msg, 'goto' => $goto, 'auto' => $auto, 'pause' => $pause));
		echo $this->output->get_output();
		exit();
	}

	// ------------------------------------------------------------------------

}

/* End of file Dili_Controller.php */
/* Location: ./admin/core/Dili_Controller.php */
	