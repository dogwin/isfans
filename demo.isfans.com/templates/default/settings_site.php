<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '站点设置';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '站点设置');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">

			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>站点设置
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
					<?php echo form_open('setting/site?tab=site_attachment', array('class' => 'form-horizontal')); ?>
					<div class="control-group">
						<label class="control-label">接口名称</label>
						<div class="controls">
							<input type='text' class='normal' name='site_name'  id="attachment_url" value="<?php echo $site -> site_name; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">接口状态</label>
						<div class="controls">
							<label>
								<div class="radio">
									<span>
										<input<?php if($site->site_status==1){?>
											checked="checked"<?php } ?> type="radio" name="site_status" style="opacity: 0;" value="1">
									</span>
								</div> 开启 </label>
							<label>
								<div class="radio">
									<span>
										<input<?php if($site->site_status==0){?>
											checked="checked"<?php } ?> type="radio" name="site_status" style="opacity: 0;" value="0">
									</span>
								</div> 关闭 </label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">关闭说明</label>
						<div class="controls">
							<input type='text' class='normal' name='site_close_reason'  id="attachment_url" value="<?php echo $site -> site_close_reason; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">访问路径</label>
						<div class="controls">
							<input type='text' class='normal' name='attachment_url'  id="attachment_url" value="<?php echo $site -> attachment_url; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">上传路径</label>
						<div class="controls">
							<input type='text' class='normal' name='attachment_dir'  id="attachment_dir" value="<?php echo $site -> attachment_dir; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">上传类型</label>
						<div class="controls">
							<input type='text' class='normal' name='attachment_type'  id="attachment_type" value="<?php echo $site -> attachment_type; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">上传大小限制</label>
						<div class="controls">
							<input type='text' class='small' name='attachment_maxupload'  id="attachment_maxupload" value="<?php echo $site -> attachment_maxupload; ?>" />
							单位：字节
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