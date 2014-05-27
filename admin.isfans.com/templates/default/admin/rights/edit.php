<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '添加权限';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '权限管理', 'url' => 'admin/role');
	$data_top['nav'][] = array('title' => '添加权限');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>添加权限
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form form-horizontal">
	            	
	              	<div class="control-group">
		                <label class="control-label">权限名称</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('right_name', 'input','',$right_name); ?><label id="E_right_name"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">控制器</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('right_class', 'input','',$right_class); ?><label id="E_right_class"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">页面/操作</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('right_method', 'input','',$right_method); ?><label id="E_right_method"></label>
		                </div>
	              	</div>
	              	<input type='hidden' value='<?php echo $id;?>' id='right_id'>
	              	<input type='hidden' value='<?php echo $page;?>' id='page'>
	              	<div class="form-actions">
	              		<div id='errormsg'></div>
	                	<input type="submit" value="保存" id='rights_save' class="btn blue">
	              	</div>
          		</div>
        	</div>
      	</div>
    </div>
</div>
<script src="<?php echo base_url();?>isfansjs/admin" type="text/javascript" language="php"></script>