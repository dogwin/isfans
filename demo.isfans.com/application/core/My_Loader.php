<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Loader 扩展CI_Loader
 *
 * 用于支持多皮肤
 *
 */		
class My_Loader extends CI_Loader
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
     * 切换视图路径
     *
     * @access  public
     * @return  void
     */
	public function switch_theme($theme = 'default')
	{
		$this->_ci_view_paths = array(APPPATH . 'templates/' . $theme . '/'	=> TRUE);
	}
	
	// ------------------------------------------------------------------------

    /**
     * 增加模型
     *
     * @access  public
     * @return  void
     */
	public function add_model($models = '../application/') {
		if(!empty($models)){
			$model_path = realpath($models);
			$model_path .= '/';
			array_unshift($this->_ci_model_paths, $model_path);
			//print_r($this->_ci_model_paths);exit;
		}
	}
	
	// ------------------------------------------------------------------------

}

/* End of file Dili_Loader.php */
/* Location: ./admin/core/Dili_Loader.php */