<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '平台信息';
	$data_top['title_'] = '平台基本信息';
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
	<div class="row-fluid">
		<div class="span12">
			<div class="portlet box red">
				<div class="portlet-title">
					<div class="caption"><i class="icon-reorder"></i>PV</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body">
					<div id="chart_2" class="chart"></div>

				</div>

			</div>
		</div>
	</div>
    <div class="row-fluid">
      	<div class="span6">
	      	<div class="portlet box green">
		      	<div class="portlet-title">
					<div class="caption"><i class="icon-comments"></i>平台信息</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>1</td>
								<td>网站名称</td>
								<td><span class="label label-success"><?php echo setting('site_name'); ?></span></td>
							</tr>
							<tr>
								<td>2</td>
								<td>版本</td>
								<td><span class="label label-info"><?php echo HC_JY_VERSION; ?>(CI:<?php echo CI_VERSION; ?>)</span></td>
							</tr>
							<tr>
								<td>3</td>
								<td>脚本语言</td>
								<td><span class="label label-warning"><?php echo 'PHP' . PHP_VERSION; ?></span></td>
							</tr>
							<tr>
								<td>3</td>
								<td>数据库</td>
								<td><span class="label label-danger"><?php echo 'MySQL' . $this -> db -> version(); ?></span></td>
							</tr>
						</tbody>
					</table>
				</div>
        	</div>
      	</div>
      	<div class="span6">
       		<div class="portlet box green">
		      	<div class="portlet-title">
					<div class="caption"><i class="icon-comments"></i>管理员</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>1</td>
								<td>当前帐号</td>
								<td><span class="label label-success"><?php echo $this -> _admin -> username; ?></span></td>
							</tr>
							<tr>
								<td>2</td>
								<td>所属角色</td>
								<td><span class="label label-info"><?php echo $this -> _admin -> name; ?></span></td>
							</tr>
							<tr>
								<td>3</td>
								<td>登录IP</td>
								<td><span class="label label-warning"><?php echo $this -> input -> ip_address(); ?></span></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
        	</div>
      	</div>
    </div>    
    <hr />
    <div class="row-fluid"> 
      	<div class="span6"> 
	      	<div class="portlet box green">
		      	<div class="portlet-title">
					<div class="caption"><i class="icon-comments"></i>系统</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>1</td>
								<td>域名</td>
								<td><span class="label label-success"><?php echo $_SERVER['SERVER_NAME']; ?></span></td>
							</tr>
							<tr>
								<td>2</td>
								<td>IP</td>
								<td><span class="label label-info"><?php echo getHostByName(php_uname('n')) . ':' . $_SERVER['SERVER_PORT']; ?></span></td>
							</tr>
							<tr>
								<td>3</td>
								<td>当前编码</td>
								<td><span class="label label-warning">utf-8</span></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
        	</div>
      	</div>
      	<div class="span6">
        	<div class="portlet box green">
		      	<div class="portlet-title">
					<div class="caption"><i class="icon-comments"></i>服务器</div>
					<div class="tools"></div>
				</div>
				<div class="portlet-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>1</td>
								<td>当前时区</td>
								<td><span class="label label-success"><?php echo date_default_timezone_get(); ?></span></td>
							</tr>
							<tr>
								<td>2</td>
								<td>上传上限</td>
								<td><span class="label label-info"><?php echo @ini_get('upload_max_filesize'); ?></span></td>
							</tr>
							<tr>
								<td>3</td>
								<td>SimpleXMLElement支持</td>
								<td><span class="label label-warning"><?php echo (class_exists('SimpleXMLElement')) ? '支持' : '不支持'; ?></span></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
        	</div>
      	</div>
	</div>
</div>
