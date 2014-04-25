<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 辅助函数库
 *
 */

// ------------------------------------------------------------------------

/**
 * 读取配置数据
 *
 * @access	public
 * @param	string	
 * @return	mixed
 */
if ( ! function_exists('setting'))
{
	function setting($key)
	{
		$ci = &get_instance();
		return 	$ci->settings->item($key);
	}
}

// ------------------------------------------------------------------------

/**
 * 更新缓存
 *
 * @access	public
 * @param	array
 * @param	string
 * @return	void
 */
if ( ! function_exists('update_cache'))
{
	function update_cache($array, $fix = '')
	{
		$ci = &get_instance();
		$ci->load->model('cache_mdl');
		$array = is_array($array) ? $array : array($array);
		//print_r($array);exit;
		foreach ($array as $v)
		{
			$method = 'update_' . $v . '_cache';
			$ci->cache_mdl->$method($fix);
		}
	}
}

// ------------------------------------------------------------------------

/**
 * 更新缓存
 *
 * @access	public
 * @param	array
 * @param	string
 * @return	void
 */
if ( ! function_exists('clear_cache'))
{
	function clear_cache($array, $fix = '')
	{
		$ci = &get_instance();
		$ci->load->model('cache_mdl');
		$ci->cache_mdl->update_data_cache();
	}
}

// ------------------------------------------------------------------------

/**
 * 将array转换成缓存字符
 *
 * @access	public
 * @param	string
 * @param	array
 * @return	void
 */
if ( ! function_exists('array_to_cache'))
{
	function array_to_cache($name, $array)
	{
		return '<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');' . PHP_EOL . 
			   '$' . $name . '=' . var_export($array, TRUE) . ';'; 
	}
}

// ------------------------------------------------------------------------

/**
 * 后台URI生成函数
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('backend_url'))
{
	function backend_url($uri = '', $qs = '')
	{
		return site_url(setting('backend_access_point') . '/' . $uri) . ($qs == '' ? '' : '?' . $qs);
	}
}

/**
 * 插件URI生成函数
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('plugin_url'))
{
	function plugin_url($plugin, $controller, $method = 'index', $qs = array())
	{
	    $ci = &get_instance();
		if (false and $ci->config->item('index_page') === '') 
	    {
	        return backend_url("plugin/$name/$controller/$method", http_build_query($qs));
	    }
	    $qs['plugin'] = $plugin;
	    $qs['c'] = $controller;
	    $qs['m'] = $method;
		return backend_url('module/run', http_build_query($qs));
	}
}

// ------------------------------------------------------------------------

/**
 * 插件URI生成函数
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('cu_head_link'))
{
	function cu_head_link($type='js', $qs = array(), $web = FALSE)
	{
		$url = base_url() . 'templates/default/media/';
		$u = array();
		$u['pl'] = $url . 'js/';
		$u['js'] = $url . 'js/';
		$u['css'] = $url . 'css/';
		$ext = $type=='pl'?'js':$type;
		
	    $ci = &get_instance();
		if($type=='form'){
			$ci->_data_hcjf['css'][] = $u['css'] . 'bootstrap-fileupload.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'jquery.gritter.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'chosen.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'select2_metro.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'jquery.tagsinput.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'clockface.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'bootstrap-wysihtml5.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'datepicker.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'timepicker.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'colorpicker.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'bootstrap-toggle-buttons.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'daterangepicker.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'datetimepicker.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'multi-select-metro.css';
			$ci->_data_hcjf['css'][] = $u['css'] . 'bootstrap-modal.css';
			
			$ci->_data_hcjf['pl'][] = $u['js'] . 'ckeditor.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-fileupload.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'chosen.jquery.min.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'select2.min.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'wysihtml5-0.3.0.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-wysihtml5.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'jquery.tagsinput.min.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'jquery.toggle.buttons.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-datepicker.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-datetimepicker.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'clockface.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'date.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'daterangepicker.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-colorpicker.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-timepicker.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'jquery.inputmask.bundle.min.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'jquery.input-ip-address-control-1.0.min.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'jquery.multi-select.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-modal.js';
			$ci->_data_hcjf['pl'][] = $u['js'] . 'bootstrap-modalmanager.js';
			$ci->_data_hcjf['init'][] = 'FormComponents.init();';
			
			
			$ci->_data_hcjf['js'][] = $u['js'] . 'form-components.js';
		}
		if(is_array($qs)){		
			foreach($qs as $val){
				if($web){
					$ci->_data_hcjf[$type][] = $val;
				}else{
					$ci->_data_hcjf[$type][] = $u[$type] . $val . '.' . $ext;
				}
			}
		}else{
			if(!empty($qs)){
				if($web){
					$ci->_data_hcjf[$type][] = $qs;
				}else{
					$ci->_data_hcjf[$type][] = $u[$type] . $qs . '.' . $ext;
				}
			}
		}
	}
}

// ------------------------------------------------------------------------

/* End of file common_helper.php */
/* Location: ./shared/heleprs/common_helper.php */