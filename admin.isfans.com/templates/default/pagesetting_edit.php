<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '修改一级页面设置';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '修改一级页面设置');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">

			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>修改一级页面设置
					</div>
					<div class="tools"></div>
				</div>

				<div class="portlet-body form">
	            <?php echo form_open('pagesetting/edit/' . $pages -> id, array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>
	              	<div class="control-group">
	                	<label class="control-label">一级页面设置名称</label>
	                	<div class="controls">
	                  		<input type="text" name="page_name" value="<?= $pages -> page_name ?>" /><label></label><?php echo form_error('account'); ?>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">所属分类</label>
	                	<div class="controls">
	                	<select name="type_id">
	                		<option value="0">无</option>
	                		<?php foreach($category_list as $key=>$value){?>
	                		<option <?php if($value->id==$pages->type_id){?>selected="selected"<?php } ?> value="<?= $value -> id ?>"><?= $value -> type_name ?></option>	
	                		<?php } ?>
	                	</select>
	                  
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">默认分类</label>
	                	<div class="controls">
	                	<select name="default_type_id">
	                		<option value="0">无</option>
	                		<?php foreach($category_list as $key=>$value){?>
	                		<option <?php if($value->id==$pages->type_id){?>selected="selected"<?php } ?> value="<?= $value -> id ?>"><?= $value -> type_name ?></option>	
	                		<?php foreach($value->submenu as $val){?>
	                			<option <?php if($val->id==$pages->default_type_id){?>selected="selected"<?php } ?> value="<?= $val -> id ?>">&nbsp;&nbsp;----><?= $val -> type_name ?></option>
	                		<?php } ?>
	                		<?php } ?>
	                	</select>
	                  
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">排布分类</label>
	                	<div class="controls">
		                	<?php
							$tem_sort = unserialize($pages -> sort_types);
							$tem_sort_type = array();
							if (!empty($tem_sort)) {
								foreach ($tem_sort as $val) {
									$tem_sort_type[] = $val['id'];
								}
							}
		                	?>
		                	<div class="row-fluid">
		                	<?php foreach($sort_type_list as $key=>$value){?>
		                		<?php if($key>1&&$key%2==1){?>
		                		</div>
		                		<div class="row-fluid">
		                		<?php }?>
		                		<div class="span3">
		                		<label class="checkbox">
									<input<?php if(in_array($value->id, $tem_sort_type)){?> checked="checked"<?php } ?> type="checkbox" name="sort_types[]" value="<?= $value -> id ?>">
									<?= $value -> title ?>
								</label>
								</div>
		                	<?php } ?>
		                	</div>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">默认排布分类</label>
	                	<div class="controls">
	                	<select name="default_sort_types_id">
	                		<option value="0">无</option>
	                		<?php foreach($sort_type_list as $key=>$value){?>
	                		<option <?php if($value->id==$pages->default_sort_types_id){?>selected="selected"<?php } ?> value="<?= $value -> id ?>"><?= $value -> title ?></option>	
	                		<?php } ?>
	                	</select>
	                  
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以地图显示</label>
	                	<div class="controls">
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->is_ViewMap==1){?> checked="checked"<?php } ?> type="radio" name="is_ViewMap" style="opacity: 0;" value="1">
							</span>
							</div>
							可以显示
							</label>
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->is_ViewMap==0){?> checked="checked"<?php } ?> type="radio" name="is_ViewMap" style="opacity: 0;" value="0">
							</span>
							</div>
							不可以显示
							</label>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以选择分类</label>
	                	<div class="controls">
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->is_SelClassify==1){?> checked="checked"<?php } ?> type="radio" name="is_SelClassify" style="opacity: 0;" value="1">
							</span>
							</div>
							可以选择
							</label>
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->is_SelClassify==0){?> checked="checked"<?php } ?> type="radio" name="is_SelClassify" style="opacity: 0;" value="0">
							</span>
							</div>
							不可以选择
							</label>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以选择城市</label>
	                	<div class="controls">
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->is_SelCity==1){?> checked="checked"<?php } ?> type="radio" name="is_SelCity" style="opacity: 0;" value="1">
							</span>
							</div>
							可以选择
							</label>
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->is_SelCity==0){?> checked="checked"<?php } ?> type="radio" name="is_SelCity" style="opacity: 0;" value="0">
							</span>
							</div>
							不可以选择
							</label>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以举报</label>
	                	<div class="controls">
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->isCanReport==1){?> checked="checked"<?php } ?> type="radio" name="isCanReport" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
							</label>
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->isCanReport==0){?> checked="checked"<?php } ?> type="radio" name="isCanReport" style="opacity: 0;" value="0">
							</span>
							</div>
							不可以
							</label>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以评分</label>
	                	<div class="controls">
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->isCanScore==1){?> checked="checked"<?php } ?> type="radio" name="isCanScore" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
							</label>
	                  		<label>
							<div class="radio">
							<span>
								<input<?php if($pages->isCanScore==0){?> checked="checked"<?php } ?> type="radio" name="isCanScore" style="opacity: 0;" value="0">
							</span>
							</div>
							不可以
							</label>
	                	</div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">是否可以查看相同帖子</label>
	                <div class="controls">
	                  	<label>
							<div class="radio">
							<span>
								<input<?php if($pages->isCanViewSamePost==1){?> checked="checked"<?php } ?> type="radio" name="isCanViewSamePost" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input<?php if($pages->isCanViewSamePost==0){?> checked="checked"<?php } ?> type="radio" name="isCanViewSamePost" style="opacity: 0;" value="0">
							</span>
							</div>
							不可以
							</label>
	                	</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以发布相同类型帖子</label>
	                	<div class="controls">
	                  		<label>
								<div class="radio">
									<span>
										<input<?php if($pages->isCanPostSamePost==1){?> checked="checked"<?php } ?> type="radio" name="isCanPostSamePost" style="opacity: 0;" value="1">
									</span>
								</div>
								可以
							</label>
	                  		<label>
								<div class="radio">
									<span>
										<input<?php if($pages->isCanPostSamePost==0){?> checked="checked"<?php } ?> type="radio" name="isCanPostSamePost" style="opacity: 0;" value="0">
									</span>
								</div>
								不可以
							</label>
	               		</div>
	              	</div>
	              	<div class="control-group">
	                	<label class="control-label">是否可以成为擂主</label>
	                	<div class="controls">
	                  		<label>
								<div class="radio">
									<span>
										<input<?php if($pages->isCanBeMaster==1){?> checked="checked"<?php } ?> type="radio" name="isCanBeMaster" style="opacity: 0;" value="1">
									</span>
								</div>
								可以
							</label>
		                  	<label>
								<div class="radio">
									<span>
										<input<?php if($pages->isCanBeMaster==0){?> checked="checked"<?php } ?> type="radio" name="isCanBeMaster" style="opacity: 0;" value="0">
									</span>
								</div>
								不可以
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