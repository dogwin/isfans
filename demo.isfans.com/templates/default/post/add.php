<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '添加帖子';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '帖子管理', 'url' => 'posts/view');
	$data_top['nav'][] = array('title' => '添加帖子');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-reorder"></i>添加帖子
					</div>
					<div class="tools"></div>
				</div>
				<div id="post_add" class="portlet-body form">
					<?php echo form_open('posts/add', array('class' => 'form-horizontal', 'name' => 'basic_validate','enctype'=>"multipart/form-data", 'id' => 'basic_validate')); ?>
					<div class="control-group">
						<label class="control-label">用户名</label>
						<div class="controls">
							<a id="post_chose_user_click" data-toggle="modal" href="#post_chose_user"></a>
							<input id="post_account" class="normal" type="text" name="account" value='' />
							<input id="user_id" class="normal" type="hidden" name="user_id" value='0' />
							<label></label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">帖子类别</label>
						<div class="controls">
							<?php $this -> form -> show('post_parent_type_id', 'select',$category,$post_parent_type_id); ?>
							<?php $this -> form -> show('post_type_id', 'select',$subcategory,$post_type_id); ?>
							<label>*帖子类别.</label><?php echo form_error('post_type_id'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">城市</label>
						<div class="controls">
							<?php $this -> form -> show('country_id', 'select',$country,$country_id); ?>
							<?php $this -> form -> show('province_id', 'select',$province,$province_id); ?>
							<?php $this -> form -> show('city_id', 'select',$city,$city_id); ?>
							<label>*城市.</label><?php echo form_error('user_type'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">帖子标题</label>
						<div class="controls">
							<?php $this->form->show('postTitle', 'input', ''); ?>
							<label>*帖子标题.</label><?php echo form_error('postTitle'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">帖子内容</label>
						<div class="controls">
							<?php $this -> form -> show('postContent', 'textarea', ''); ?>
							<label>*帖子内容</label><?php echo form_error('postContent'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">lng</label>
						<div class="controls">
							<?php $this->form->show('lng', 'input', ''); ?>
							<label>*lng.</label><?php echo form_error('lng'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">lat</label>
						<div class="controls">
							<?php $this->form->show('lat', 'input', ''); ?>
							<label>*lat.</label><?php echo form_error('lat'); ?>
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
	              	<div class="control-group">
	                	<label class="control-label">首页推荐</label>
	                	<div class="controls">
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="index_show" style="opacity: 0;" value="1" <?php echo $index_show==1?'checked="checked"':'';?>>
								</span>
								</div>
								推荐
							</label>
		                  	<label>
								<div class="radio">
								<span>
									<input type="radio" name="index_show" style="opacity: 0;" value="0" <?php echo $index_show==0?'checked="checked"':'';?>>
								</span>
								</div>
								不推荐
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
<div id="post_chose_user" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel1" role="dialog" tabindex="-1" style="display: none;">
	<div class="modal-header">
		<button class="close" aria-hidden="true" data-dismiss="modal" type="button"></button>
		<h3 id="myModalLabel1">查找会员</h3>
	</div>
	<div class="modal-body">
		<p>
			<div class="portlet-body form">
	         	<div class="control-group">
	            	<label class="control-label">用户名</label>
	            	<div class="controls">
						<label class="line">
	                  		<input id="search_account" type="text" value="" name="search_account" />
						</label>
						<label class="line msg" style="color:red"></label>
	            	</div>
	          	</div>
         	</div>
		</p>
	</div>
	<div class="modal-footer">
		<button class="btn" aria-hidden="true" data-dismiss="modal">关闭</button>
		<button class="btn search yellow">查询</button>
	</div>
</div>
<script language="JavaScript"  type="text/javascript">
	$("#post_parent_type_id").change(function(){
		var cat_id = $(this).val();
		$.ajax({
    		url: "<?= base_url()?>posts/ajax",type:"post",
    		dataType: "json",
    		data:"&tab=category&cat_id="+cat_id+'&xiaotangcai_csrf_test_name='+ getCookie('xiaotangcai_csrf_cookie_name'),
    		success: function(data){
    			//console.log(data);
    			$("#post_type_id").html(data.info);
      		},
      		error:function(e){
      			console.log(e);
      		}
      	});
	});
	$("#country_id").change(function(){
		var id = $(this).val();
		$.ajax({
    		url: "<?= base_url()?>posts/ajax",type:"post",
    		dataType: "json",
    		data:"&tab=city&country_id="+id+'&xiaotangcai_csrf_test_name='+ getCookie('xiaotangcai_csrf_cookie_name'),
    		success: function(data){
    			//console.log(data);
    			$("#province_id").html(data.info);
      		},
      		error:function(e){
      			console.log(e);
      		}
      	});
	});
	$("#province_id").change(function(){
		var id = $(this).val();
		$.ajax({
    		url: "<?= base_url()?>posts/ajax",type:"post",
    		dataType: "json",
    		data:"&tab=city&province_id="+id+'&xiaotangcai_csrf_test_name='+ getCookie('xiaotangcai_csrf_cookie_name'),
    		success: function(data){
    			//console.log(data);
    			$("#city_id").html(data.info);
      		},
      		error:function(e){
      			console.log(e);
      		}
      	});
	});
</script>
