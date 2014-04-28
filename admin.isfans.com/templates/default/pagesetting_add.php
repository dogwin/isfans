<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '添加一级页面设置';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '添加一级页面设置');
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
	            <?php echo form_open('pagesetting/add', array('class' => 'form-horizontal', 'name' => 'basic_validate', 'id' => 'basic_validate')); ?>
	              <div class="control-group">
	                <label class="control-label">一级页面设置名称</label>
	                <div class="controls">
	                  <input type="text" name="page_name" value="" /><label></label><?php echo form_error('account'); ?>
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">所属分类</label>
	                <div class="controls">
	                	<select name="type_id">
	                		<option value="0">无</option>
	                		<?php foreach($category_list as $key=>$value){?>
	                		<option value="<?= $value -> id ?>"><?= $value -> type_name ?></option>	
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
	                		<option value="<?= $value -> id ?>"><?= $value -> type_name ?></option>	
	                		<?php foreach($value->submenu as $val){?>
	                			<option value="<?= $val -> id ?>">&nbsp;&nbsp;----><?= $val -> type_name ?></option>
	                		<?php } ?>
	                		<?php } ?>
	                	</select>
	                  
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">排布分类</label>
	                <div class="controls">
	                	<?php foreach($sort_type_list as $key=>$value){?>
	                		<label class="checkbox line">
								<div class="checker">
								<span class="">
								<input type="checkbox" name="sort_types[]" value="<?= $value -> id ?>">
								</span>
								</div>
								<?= $value -> title ?>
							</label>
	                	<?php } ?>
	                </div>
	              </div>
	              <div class="control-group">
	                <label class="control-label">默认排布分类</label>
	                <div class="controls">
	                	<select name="default_sort_types_id">
	                		<option value="0">无</option>
	                		<?php foreach($sort_type_list as $key=>$value){?>
	                		<option value="<?= $value -> id ?>"><?= $value -> title ?></option>	
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
								<input type="radio" name="is_ViewMap" style="opacity: 0;" value="1">
							</span>
							</div>
							可以显示
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="is_ViewMap" style="opacity: 0;" value="0">
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
								<input type="radio" name="is_SelClassify" style="opacity: 0;" value="1">
							</span>
							</div>
							可以选择
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="is_SelClassify" style="opacity: 0;" value="0">
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
								<input type="radio" name="is_SelCity" style="opacity: 0;" value="1">
							</span>
							</div>
							可以选择
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="is_SelCity" style="opacity: 0;" value="0">
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
								<input type="radio" name="isCanReport" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="isCanReport" style="opacity: 0;" value="0">
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
								<input type="radio" name="isCanScore" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="isCanScore" style="opacity: 0;" value="0">
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
								<input type="radio" name="isCanViewSamePost" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="isCanViewSamePost" style="opacity: 0;" value="0">
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
								<input type="radio" name="isCanPostSamePost" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="isCanPostSamePost" style="opacity: 0;" value="0">
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
								<input type="radio" name="isCanBeMaster" style="opacity: 0;" value="1">
							</span>
							</div>
							可以
						</label>
	                  	<label>
							<div class="radio">
							<span>
								<input checked="checked" type="radio" name="isCanBeMaster" style="opacity: 0;" value="0">
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