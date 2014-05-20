<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '修改管理员';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '管理员管理', 'url' => 'admin/edit');
	$data_top['nav'][] = array('title' => '修改管理员');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>修改管理员
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form form-horizontal">
	              	<div class="control-group">
		                <label class="control-label">管理员名称</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('username', 'input', '',$username); ?>
		                  	<label id="admin_username"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">Email</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('email', 'input', '',$email); ?>
		                  	<label id="admin_email"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">密码</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('password', 'password', ''); ?>
		                  	<label id="admin_password"></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">认证密码</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('repassword', 'password', ''); ?>
		                  	
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">角色</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('role', 'select',$roleArr,$role); ?>
		                  	<label id="admin_role"></label>
		                </div>
	              	</div>
	              	<input type='hidden' value='<?php echo $id?>' id='admin_id'>
	              	<div class="form-actions">
	              		<div id="errormsg"></div>
	                	<input type="submit" value="保存" id='menus_save' class="btn blue">
	              	</div>
          		</div>
        	</div>
      	</div>
    </div>
</div>
<script src="<?php echo base_url();?>isfansjs/admin" type="text/javascript" language="php"></script> 