<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '修改角色';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '角色管理', 'url' => 'role/view');
	$data_top['nav'][] = array('title' => '修改角色');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>修改角色
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
	            	<?php echo form_open('role/edit/' . $role -> id, array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>
	              	<div class="control-group">
		                <label class="control-label">角色名称</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('name', 'input', '', $role -> name); ?><label>*3-20位角色标识</label><?php echo form_error('name'); ?>
		                </div>
	              	</div>
	              	<div class="control-group">
		                <label class="control-label">允许的权限</label>
		                <div class="controls">
							<?php
							$role->rights = explode(',',$role->rights);
							foreach($rights as $key=>$v): ?>
	                        <label class="attr"><input type="checkbox" <?php echo in_array($key, $role -> rights) ? 'checked="checked"' : ''; ?> value="<?php echo $key; ?>" name="right[]"><?php echo $v; ?></label>
							<?php endforeach; ?>
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