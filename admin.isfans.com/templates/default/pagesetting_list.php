<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '一级页面设置管理';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '一级页面设置管理');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box grey">
          	<div class="portlet-title">
				<div class="caption"><i class="icon-globe"></i>一级页面设置管理</div>
				<div class="actions">
					<a class="btn blue" href="<?= base_url()?>pagesetting/add"><i class="icon-pencil"></i>添加一级页面设置</a>
					<div class="btn-group action">
						
					</div>
				</div>
			</div>
          	<div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>页面名称</th>
                  <th>默认帖子分类</th>
                  <th>默认帖子排布分类</th>
                  <th>是否可以地图显示</th>
                  <th>是否可以选择分类</th>
                  <th>是否可以选择城市</th>
                  <th>是否可以举报</th>
                  <th>是否可以评分</th>
                  <th>是否可以成为擂主</th>
                  <th>操作选项</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach($list as $v) : ?>
                <tr>
                  <td><?php echo $v->id; ?></td>
                  <td><?php echo $v->page_name; ?></td>
                  <td><?php echo isset($category_list[$v->default_type_id])?$category_list[$v->default_type_id]->type_name:'无'; ?></td>
                  <td><?php echo isset($sort_type_list[$v->default_sort_types_id])?$sort_type_list[$v->default_sort_types_id]->title:'无'; ?></td>
                  <td><?php echo $v->is_ViewMap==1?'✔':'✘'; ?></td>
                  <td><?php echo $v->is_SelClassify==1?'✔':'✘'; ?></td>
                  <td><?php echo $v->is_SelCity==1?'✔':'✘'; ?></td>
                  <td><?php echo $v->isCanReport==1?'✔':'✘'; ?></td>
                  <td><?php echo $v->isCanScore==1?'✔':'✘'; ?></td>
                  <td><?php echo $v->isCanBeMaster==1?'✔':'✘'; ?></td>
                  <td>
				  	<a href="<?php echo backend_url('pagesetting/edit/'.$v->id); ?>"><span class="label label-success">修改</span></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="pages_bar pagination"><?php echo $pagination; ?></div>
          </div>
        </div>
      </div>
    </div>
</div>