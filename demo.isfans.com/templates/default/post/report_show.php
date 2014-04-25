<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
 ?>
<div class="container-fluid">
	<?php
	$title = '查看帖子举报';
	$data_top = array();
	$data_top['title'] = $title;
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '帖子举报管理', 'url' => 'post_report/view');
	$data_top['nav'][] = array('title' => $title);
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-globe"></i>帖子举报详细
					</div>
					<div class="actions">
						<div class="btn-group action"></div>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table sliders table-striped">
						<tbody>
							<tr>
								<td style="width:15%">举报详情</td>
								<td><div class="slider slider-basic bg-red"></div></td>
							</tr>
							<tr>
								<td>举报人</td>
								<td>
									<div class="slider-vertical-value">
									<?= $post_report_info->user_name?>
									</div>
								</td>
							</tr>
							<tr>
								<td>举报标题</td>
								<td>
									<div class="slider-vertical-value">
										<?= $post_report_info->post_title?>
									</div>
								</td>
							</tr>
							<tr>
								<td>举报内容</td>
								<td>
									<div class="slider-vertical-value">
										<?= $post_report_info->reportcontent?>
									</div>
								</td>
							</tr>
							<tr>
								<td>帖子详情</td>
								<td>
									<div class="slider-vertical-value"></div>
								</td>
							</tr>
							<tr>
								<td>帖子标题</td>
								<td>
									<div class="slider-vertical-value">
										<?= $post_info->postTitle?>
									</div>
								</td>
							</tr>
							<tr>
								<td>帖子内容</td>
								<td>
									<div class="slider-vertical-value">
										<?= $post_info->postContent?>
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<div class="slider-vertical-value">
										<a class="button blue" href="<?= base_url()?>post_report/view">返回</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
</div>