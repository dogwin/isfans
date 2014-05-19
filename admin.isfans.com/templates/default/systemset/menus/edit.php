<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '修改菜单';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '菜单管理', 'url' => 'systemset/menus/edit');
	$data_top['nav'][] = array('title' => '修改菜单');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>修改菜单
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form form-horizontal">
	              	<div class="control-group">
		                <label class="control-label">主分类</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('menu_parent', 'select',$menuArr,$menu_parent); ?>
		                  	<label id="M_menu_parent"></label>
		                </div>
	              	</div>
	              	
	              	<div class="control-group">
		                <label class="control-label">菜单名称</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('menu_name', 'input', '',$menu_name); ?>
		                  	<label id="M_menu_name"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">控制器</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('class_name', 'input', '',$class_name); ?>
		                  	<label id="M_class_name"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">页面</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('method_name', 'input', '',$method_name); ?>
		                  	<label id="M_method_name"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">等级</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('menu_level', 'input', '',$menu_level); ?>
		                  	<label id="M_menu_level"></label>
		                </div>
	              	</div>
	              	<input type='hidden' value='<?php echo $menuID?>' id='menu_id'>
	              	<input type='hidden' value='<?php echo $page;?>' id='page'>
	              	<div class="form-actions">
	              		<div id="errormsg"></div>
	                	<input type="submit" value="保存" id='menus_save' class="btn blue">
	              	</div>
          		</div>
        	</div>
      	</div>
    </div>
</div>
<script src="<?php echo base_url();?>isfansjs/systemset" type="text/javascript" language="php"></script> 