<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '菜单管理';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '菜单管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<div class="row-fluid">
      	<div class="span12">
      		<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
          		<div class="portlet-title">
					<div class="caption"><i class="icon-globe"></i>菜单列表</div>
					<div class="actions">
						<a class="btn blue" href="<?= base_url() ?>systemset/menus/edit"><i class="icon-pencil"></i>添加菜单</a>
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
          			<form style="margin:0" action="<?= base_url() ?>systemset/menus" method="post" name="forms">
	          		<?php //echo form_hidden_s(); ?>
					<div class="row-fluid">
						<div class="span12 pull-right">
							<div class="dataTables_filter pull-right">
								<label>
									Search:
									菜单：<input type="text" name="keyword" placeholder="搜索关键词" class="m-wrap medium" value="<?= $word['keyword'] ?>">
									<button class="btn btn_search btn-primary">搜索</button>
								</label>
								
							</div>
						</div>
					</div>
	          		</form>
		            <table class="table table-striped table-bordered table-hover">
		              	<thead>
			                <tr>
				            	<th></th>
				                <th>根菜单</th>
				                <th>菜单名称</th>
				                <th>操作选项</th>
			                </tr>
              			</thead>
              			<tbody>
              				<?php foreach($list as $v) : ?>
                			<tr class="odd gradeX">
                				<td></td>
                				<td><?php echo $v->menu_parent?$this->systemset_mdl->get_menu_by_id($v->menu_parent)->menu_name:'根目录';?></td>
                  				<td><?php echo $v -> menu_name; ?></td>
                  				<td>
				  					<a class="" href="<?php echo backend_url('systemset/menus/edit/' . $v -> menu_id); ?>"><span class="label label-success">修改</span></a>
                    				<a class="confirm_delete" href="<?php echo backend_url('systemset/menus/del/' . $v -> menu_id); ?>"><span class="label label-success">删除</span></a>
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