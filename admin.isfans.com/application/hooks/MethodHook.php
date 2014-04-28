<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * pre-controller Hook
 *
 */

class MethodHook 
{
	/**
     * 构造函数
     *
     * @access  public
     * @return  void
     */	
	public function __construct()
	{
		//nothing to do yet!	
	}
	
	// ------------------------------------------------------------------------

    /**
     * 将POST请求的方法method变成_method_post。
     *
     * @access  public
     * @return  void
     */	
	public function redirect()
	{
		global $method;
		if ($_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			$method = '_' . $method . '_post';
		}
	}
		
	// ------------------------------------------------------------------------

}

/* End of file MethodHook.php */
/* Location: ./admin/hooks/MethodHook.php */
