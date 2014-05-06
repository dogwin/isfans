<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//cache_set 
if(!function_exists('cache_set')){
	function cache_set($cachekey,$obj,$force_refresh=FALSE){
		$data	= $this->cache->get($cachekey);
		if( FALSE!==$data && TRUE!=$force_refresh ) {
			return $data;
		}
		if($obj){
			$this->cache->save($cachekey,$obj,3000);
			return $obj;
		}
		$this->cache->delete($cachekey);
		return FALSE;
	}
}
