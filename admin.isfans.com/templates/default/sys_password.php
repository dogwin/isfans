<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '修改密码';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '修改密码');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>修改密码
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
	            	<?php echo form_open('system/password', array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>
	              	<div class="control-group">
		                <label class="control-label">旧密码</label>
		                <div class="controls">
		                  	<input name='old_pass' type='password' class='normal' id="old_pass"  />
							<label>*<?php echo form_error('old_pass'); ?></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">新密码</label>
		                <div class="controls">
		                  	<input name='new_pass' type='password' class='normal' id="new_pass" />
							<label>*<?php echo form_error('new_pass'); ?></label>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">确认新密码</label>
		                <div class="controls">
		                  	<input name='new_pass_confirm' type='password' class='normal' id="new_pass_confirm"  />
							<label>*<?php echo form_error('new_pass_confirm'); ?></label>
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