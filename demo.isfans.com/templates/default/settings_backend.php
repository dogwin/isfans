<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '后台设置';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '后台设置');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>后台设置
					</div>
					<div class="tools"></div>
				</div>

				<div class="portlet-body form">
					<?php echo form_open('setting/backend', array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>

					<div class="control-group">
						<label class="control-label">后台语言</label>
						<div class="controls">
							<input type='text' class='normal' name="backend_lang"  value="<?php echo $backend -> backend_lang; ?>" disabled="disabled" autocomplete="off" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">后台网页标题</label>
						<div class="controls">
							<input type='text' class='normal' name="backend_title" value="<?php echo $backend -> backend_title; ?>" autocomplete="off" />
							<label>用于显示网页标题</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">是否允许root用户登录</label>
						<div class="controls">
							<label>
								<input type="radio" name="backend_root_access" <?php echo $backend -> backend_root_access ? 'checked="checked"' : ''; ?>
								value="1" >开启</label>
							<label>
								<input type="radio" name="backend_root_access" value="0" <?php echo !$backend -> backend_root_access ? 'checked="checked"' : ''; ?>
								>关闭</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">每页记录数</label>
						<div class="controls">
							<input type='text' id="mask-number" class='mask' name="backend_page_count" value="<?php echo $backend -> backend_page_count; ?>" />
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