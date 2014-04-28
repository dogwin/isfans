<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '清除数据缓存';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '清除数据缓存');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>清除数据缓存
					</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body form">
	            	<?php echo form_open('system/cache', array('class' => 'form-horizontal', 'id' => 'cache_form', 'name' => 'cache_form')); ?>
	             	<div class="control-group">
	                	<label class="control-label">清除数据缓存</label>
	                	<div class="controls">
							<label class="checkbox line">
		                  		<input type="checkbox" value="data" name="cache[]" />
							</label>
	                	</div>
	              	</div>
	              	<div class="form-actions">
	                	<input type="submit" value="清除" class="blue">
	              	</div>
	            	</form>
         		</div>
        	</div>
      	</div>
    </div>
</div>