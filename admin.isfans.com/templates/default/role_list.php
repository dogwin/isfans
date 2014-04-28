<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '角色管理';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '角色管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<div class="row-fluid">
      	<div class="span12">
      		<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
          		<div class="portlet-title">
					<div class="caption"><i class="icon-globe"></i>角色列表</div>
					<div class="actions">
						<a class="btn blue" href="<?= base_url() ?>role/add"><i class="icon-pencil"></i>添加角色</a>
						<div class="btn-group action">
							<a class="btn green" data-toggle="dropdown" href="#"><i class="icon-cogs"></i>操作<i class="icon-angle-down"></i></a>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="javascript:;" data-action="del"><i class="icon-trash"></i>删除</a>
								</li>
								<li class="divider"></li>
							</ul>
						</div>
					</div>
				</div>
          		<div class="portlet-body">
		            <table class="table table-striped table-bordered table-hover">
		              	<thead>
			                <tr>
				            	<th></th>
				                <th>角色名称</th>
				                <th>操作选项</th>
			                </tr>
              			</thead>
              			<tbody>
              				<?php foreach($list as $v) : ?>
                			<tr class="odd gradeX">
                  				<td></td>
                  				<td><?php echo $v -> name; ?></td>
                  				<td>
				  					<a class="" href="<?php echo backend_url('role/edit/' . $v -> id); ?>"><span class="label label-success">修改</span></a>
                    				<a class="confirm_delete" href="<?php echo backend_url('role/del/' . $v -> id); ?>"><span class="label label-success">删除</span></a>
				  				</td>
                			</tr>
                			<?php endforeach; ?>
              			</tbody>
            		</table>
            		<?php echo $pagination; ?>
          		</div>
        	</div>
      	</div>
    </div>
</div>