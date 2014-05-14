<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<link href="<?= base_url() ?>templates/default/media/css/error.css" rel="stylesheet" type="text/css"/>
<div class="container-fluid">
	<?php
	$data_top = array();
	$data_top['title'] = '提示信息';
	$data_top['title_'] = '';
	$data_top['nav'][] = array('title' => '提示信息');
	?>
	<?php $this -> load -> view('system_setting', $data_top); ?>
	<!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
    	<div class="span12 page-404">
			<div class="number">
				
			</div>
			<div class="details">
				<h3><?php echo $msg; ?></h3>
              	<?php if($auto): ?>
              	<script>
                    function redirect($url)
                    {
                        location = $url;
                    }
                    setTimeout("redirect('<?php echo $goto; ?>');",<?php echo $pause; ?>
						);
                </script>
              	<p><a href="<?php echo $goto; ?>" style="text-decoration:underline"><?php echo "页面正在自动转向，你也可以点此直接跳转！"; ?></a></p>
              	<?php endif; ?>
              	<p><a class="btn btn-warning btn-big"  href="<?= base_url() ?>">后台首页</a></p> 
			</div>
		</div>
	</div>
</div>