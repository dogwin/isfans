<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '更新缓存';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '更新缓存');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>更新缓存
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
					<?php echo form_open('system/cache', array('class' => 'form-horizontal', 'id' => 'cache_form', 'name' => 'cache_form')); ?>
					<div class="control-group">
						<label class="control-label">菜单缓存</label>
						<div class="controls">
							<label class="checkbox line">
								<input type="checkbox" value="menu" name="cache[]" />
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">权限数据缓存</label>
						<div class="controls">
							<label class="checkbox line">
								<input type="checkbox" value="role" name="cache[]" />
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">后台设置缓存</label>
						<div class="controls">
							<label class="checkbox line">
								<input type="checkbox" value="backend" name="cache[]" />
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">接口设置缓存</label>
						<div class="controls">
							<label class="checkbox line">
								<input type="checkbox" value="site" name="cache[]" />
							</label>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" value="更新" class="btn blue">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>