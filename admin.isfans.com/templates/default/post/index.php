<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
 ?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '帖子管理';
	$data_top['title_'] = '帖子管理';
	$data_top['nav'][] = array('title' => '帖子管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
          		<div class="portlet-title">
					<div class="caption"><i class="icon-globe"></i>帖子列表</div>
					<div class="actions">
						<a class="btn blue" data-toggle="modal" href="<?= base_url()?>posts/add"><i class="icon-pencil"></i>添加帖子</a>
						<div class="btn-group action">
							<a class="btn green" data-toggle="dropdown" href="#"><i class="icon-cogs"></i>操作<i class="icon-angle-down"></i></a>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="javascript:;" data-action="active"><i class="icon-trash"></i>禁用</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:;" data-action="actives"><i class="icon-trash"></i>开启</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
          		<div class="portlet-body">
	          		<form style="margin:0" action="<?= base_url() ?>posts/view" method="post" name="forms">
	          		<?php echo form_hidden_s(); ?>
					<div class="row-fluid">
						<div class="span12 pull-right">
							<div class="dataTables_filter pull-right">
								<label>
									Search:
									<input type="text" name="keyword" placeholder="搜索关键词" class="m-wrap medium" value="<?= $word['keyword'] ?>">
									<button class="btn btn_search btn-primary">搜索</button>
								</label>
								
							</div>
						</div>
					</div>
	          		</form>
		          	<?php
					$pg = intval($this -> input -> get('page'));
					$pu = $pg > 1 ? '?page=' . $pg : '';
		          	?>
          			<form class="option_form" page="<?= $pu ?>" action="<?= base_url() ?>member_enter/" method="post" name="form1">
          			<?php echo form_hidden_s(); ?>
            		<table class="table table-striped table-bordered table-hover" >
              			<thead>
                			<tr>
			                  	<th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
			                  	<th>帖子名称</th>
			                  	<th>发布人</th>
			                  	<th>帖子类型</th>
			                  	<th>所属城市</th>
			                  	<th>发布日期</th>
			                  	<th>状态</th>
			                  	<th>审核状态</th>
			                  	<th>操作选项</th>
                			</tr>
              			</thead>
              			<tbody>
			              	<?php 
			              		$status = array(
										0	=>	'未审核',
										1	=>	'审核中',
										2	=>	'审核通过',
										3	=>	'审核未通过',
										4	=>	'退回重审',
								);
			              		foreach($list as $v) :
			              		$userinfo = $this->user_mdl->get_user_by_id($v->user_id); 
								$cityinfo = $this->city_mdl->get_city_by_id($v->city_id);
			              	?>
			                <tr class="odd gradeX">
		                  		<td><input type="checkbox" name="id[]" value="<?= $v -> id ?>" /></td>
		                  		<td><?php echo $v->postTitle; ?></td>
		                  		<td><?php echo $userinfo->name; ?></td>
		                  		<td><?php echo $v->post_type_name; ?></td>
		                  		<td><?php echo $cityinfo->name; ?></td>
		                  		<td><?php echo date('Y-m-d H:i',$v->date); ?></td>
		                  		<td><?php echo 1; ?></td>
		                  		<td><?php echo 1; ?></td>
		                  		<td>
						  			<a class="" href="<?php echo backend_url('posts/edit/' . $v -> id);
									echo $pu;
								?>"><span class="label label-success">修改</span></a>
									
		                    		<a class="confirm_delete" href="<?php echo backend_url('posts/active/' . $v->id); ?>"><span class="label label-success">禁用</span></a>
						  			
						  			<a class="confirm_delete" href="<?php echo backend_url('posts/active/' . $v->id); ?>/1"><span class="label label-success">开启</span></a>
						  			
						  			<a class="confirm_delete" href="<?php echo backend_url('posts/examine/' . $v->id); ?>"><span class="label label-success">审核</span></a>
						  		</td>
                			</tr>
                			<?php endforeach; ?>
              			</tbody>
            		</table>
            		</form>
            		<?php echo $pagination; ?>
          		</div>
        	</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
</div>
<div id="chose_user" class="modal hide fade" aria-hidden="true" aria-labelledby="myModalLabel1" role="dialog" tabindex="-1" style="display: none;">
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
						<label class="checkbox line">
	                  		<input id="account" type="text" value="" name="account" />
						</label>
						<label class="checkbox line msg" style="color:red">
	                  		
						</label>
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