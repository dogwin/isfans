<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
 ?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '企业推送';
	$data_top['title_'] = '管理企业推送';
	$data_top['nav'][] = array('title' => '企业推送管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
          		<div class="portlet-title">
					<div class="caption"><i class="icon-globe"></i>企业推送列表</div>
					<div class="actions">
						<a class="btn blue" data-toggle="modal" href="#chose_user"><i class="icon-pencil"></i>添加企业推送</a>
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
	          		<form style="margin:0" action="<?= base_url() ?>member_push/view" method="post" name="forms">
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
			                  	<th>企业名称</th>
			                  	<th>用户名</th>
			                  	<th>企业负责人</th>
			                  	<th>企业类型</th>
			                  	<th>企业审核状态</th>
			                  	<th>企业状态</th>
			                  	<th>是否显示</th>
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
			              	?>
			                <tr class="odd gradeX">
		                  		<td><input type="checkbox" name="id[]" value="<?= $v -> id ?>" /></td>
		                  		<td><?php echo $v->enterprisename; ?></td>
		                  		<td><?php echo $userinfo -> name; ?></td>
		                  		<td><?php echo $v->main_people; ?></td>
		                  		<td><?php echo $v->user_type_name; ?></td>
		                  		<td><?php echo isset($status[$v->is_open])?$status[$v->is_open]:'未识别'; ?></td>
		                  		<td><?php echo $v->active==1?'正常':'已禁用'; ?></td>
		                  		<td><?php echo $v->is_show==1?'显示':'不显示'; ?></td>
		                  		<td>
						  			<a class="" href="<?php echo backend_url('member_push/edit/' . $v -> id);
									echo $pu;
								?>"><span class="label label-success">修改</span></a>
									<?php if($v->active==1){?>
		                    		<a class="confirm_delete" href="<?php echo backend_url('member_push/active/' . $v->id); ?>"><span class="label label-success">禁用</span></a>
						  			<?php }else{?>
						  			<a class="confirm_delete" href="<?php echo backend_url('member_push/active/' . $v->id); ?>/1"><span class="label label-success">开启</span></a>
						  			<?php }?>
						  			<a class="confirm_delete" href="<?php echo backend_url('member_push/examine/' . $v->id); ?>"><span class="label label-success">审核</span></a>
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
		<h3 id="myModalLabel1">查找帖子</h3>
	</div>
	<div class="modal-body">
		<p>
			<div class="portlet-body form">
	        	
	         	<div class="control-group">
	            	<label class="control-label">帖子名称</label>
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