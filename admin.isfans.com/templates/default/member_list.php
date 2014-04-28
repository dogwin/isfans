<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
 ?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '会员管理';
	$data_top['title_'] = '管理个人会员';
	$data_top['nav'][] = array('title' => '会员管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
          		<div class="portlet-title">
					<div class="caption"><i class="icon-globe"></i>会员列表</div>
					<div class="actions">
						<!--<a class="btn blue" href="#"><i class="icon-pencil"></i>添加</a>-->
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
	          		<form style="margin:0" action="<?= base_url() ?>member/view" method="post" name="forms">
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
          			<form class="option_form" page="<?= $pu ?>" action="<?= base_url() ?>member/" method="post" name="form1">
          			<?php echo form_hidden_s(); ?>
            		<table class="table table-striped table-bordered table-hover" >
              			<thead>
                			<tr>
			                  	<th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" /></th>
			                  	<th>用户帐号</th>
			                  	<th>用户名</th>
			                  	<th>用户类型</th>
			                  	<th>用户状态</th>
			                  	<th>操作选项</th>
                			</tr>
              			</thead>
              			<tbody>
			              	<?php foreach($list as $v) : ?>
			                <tr class="odd gradeX">
		                  		<td><input type="checkbox" name="user_id[]" value="<?= $v -> id ?>" /></td>
		                  		<td><?php echo $v -> account; ?></td>
		                  		<td><?php echo $v -> name; ?></td>
		                  		<td><?php echo $v -> user_type_name; ?></td>
		                  		<td><?php echo $v->active==1?'正常':'已禁用'; ?></td>
		                  		<td>
						  			<a class="" href="<?php echo backend_url('member/show/' . $v -> id);
									echo $pu;
								?>"><span class="label label-success">查看</span></a>
		                    		<?php if($v->active==1){?>
		                    		<a class="confirm_delete" href="<?php echo backend_url('member/active/' . $v->id); ?>"><span class="label label-success">禁用</span></a>
						  			<?php }else{?>
						  			<a class="confirm_delete" href="<?php echo backend_url('member/active/' . $v->id); ?>/1"><span class="label label-success">开启</span></a>
						  			<?php }?>
		                    		<?php if($v->user_type==1){?>
						  			<a class="confirm_delete" href="<?php echo backend_url('member_enter/add/' . $v -> id); ?>"><span class="label label-success">升级</span></a>
						  			<?php }?>
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