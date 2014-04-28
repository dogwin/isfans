<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '修改国家';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '国家管理', 'url' => 'area_country/view');
	$data_top['nav'][] = array('title' => '修改国家');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>修改国家
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
	            	<?php echo form_open('area_country/edit/'.$country_id, array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>
	              	<div class="control-group">
		                <label class="control-label">国家名称</label>
		                <div class="controls">
		                  	<?php $this -> form -> show('name', 'input', '',$name); ?><label>*国家名称</label><?php echo form_error('name'); ?>
		                </div>
	              	</div>
	 
	              	<div class="control-group">
	                	<label class="control-label">是否显示</label>
	                	<div class="controls">
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="is_show" style="opacity: 0;" value="1" <?php echo $is_show==1?'checked="checked"':'';?>>
								</span>
								</div>
								是
							</label>
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="is_show" style="opacity: 0;" value="0" <?php echo $is_show==0?'checked="checked"':'';?>>
								</span>
								</div>
								否
							</label>
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