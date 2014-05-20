<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '管理员管理';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '管理员管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<div class="row-fluid">
      	<div class="span12">
      		<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
          		<div class="portlet-title">
					<div class="caption"><i class="icon-globe"></i>管理员列表</div>
					<div class="actions">
						<a class="btn blue" href="<?= base_url() ?>admin/edit"><i class="icon-pencil"></i>添加管理员</a>
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
          			<form style="margin:0" action="<?= base_url('admin/index') ?>" method="post" name="forms">
	          		<?php //echo form_hidden_s(); ?>
					<div class="row-fluid">
						<div class="span12 pull-right">
							<div class="dataTables_filter pull-right">
								<label>
									Search:
									管理员：<input type="text" name="keyword" placeholder="搜索关键词" class="m-wrap medium" value="<?= $word['keyword'] ?>">
									<button class="btn btn_search blue">搜索</button>
								</label>
								
							</div>
						</div>
					</div>
	          		</form>
		            <table class="table table-striped table-bordered table-hover">
		              	<thead>
			                <tr>
				            	<th></th>
				                <th>管理员</th>
				                <th>角色</th>
				                <th>操作选项</th>
			                </tr>
              			</thead>
              			<tbody>
              				<?php foreach($list as $v) : ?>
                			<tr class="odd gradeX">
                				<td></td>
                				<td><?php echo $v->username;?></td>
                  				<td><?php echo $v ->role; ?></td>
                  				<td>
				  					<a class="" href="<?php echo base_url('admin/edit/' . $v -> id); ?>"><span class="label label-success">修改</span></a>
                    				<a href='#myAlert<?= $v->id?>' class="tip-top" data-toggle="modal" data-original-title="删除"><span class="label label-success">删除</span></a>
                    				<div id="myAlert<?= $v->id;?>" class="modal hide">
						              <div class="modal-header">
						                <button data-dismiss="modal" class="close" type="button">×</button>
						                <h3>删除管理员</h3>
						              </div>
						              <div class="modal-body">
						                <p>确定要删除<?= $v -> username?>吗?</p>
						              </div>
						              <div class="modal-footer"> <a class="btn blue" href="<?php echo base_url('admin/del/' . $v -> id); ?>">确定</a> <a data-dismiss="modal" class="btn" href="#">取消</a> </div>
						            </div>
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