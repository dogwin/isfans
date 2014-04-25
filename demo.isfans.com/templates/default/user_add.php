<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '添加管理员';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '管理员管理', 'url' => 'user/view');
	$data_top['nav'][] = array('title' => '添加管理员');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>添加管理员
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
					<?php echo form_open('user/add', array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>
					<div class="control-group">
						<label class="control-label">用户名称</label>
						<div class="controls">
							<?php $this -> form -> show('username', 'input', ''); ?>
							<label>*3-16位用户名称.</label><?php echo form_error('username'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">用户密码</label>
						<div class="controls">
							<input class="normal" type="password" maxlength="16" name="password" />
							<label>*6-16位用户密码.</label><?php echo form_error('password'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">重复用户密码</label>
						<div class="controls">
							<input class="normal" type="password" maxlength="16" name="confirm_password" />
							<label>*6-16位用户密码.</label><?php echo form_error('confirm_password'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">用户EMAIL</label>
						<div class="controls">
							<?php $this -> form -> show('email', 'input', ''); ?>
							<label>*有效的EMAIL地址.</label><?php echo form_error('email'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">角色</label>
						<div class="controls">
							<?php $this -> form -> show('role', 'select', $roles); ?>
							<label>*设置角色.</label><?php echo form_error('role'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">帐号状态</label>
						<div class="controls">
							<?php $this -> form -> show('status', 'select', array(1 => '正常', 2 => '冻结')); ?>
							<label>*设置用户状态，设为冻结用户将不可登录.</label><?php echo form_error('status'); ?>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" value="保存" class="btn blue">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>