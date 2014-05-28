<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="color-panel hidden-phone">
	<div class="color-mode-icons icon-color"></div>
	<div class="color-mode-icons icon-color-close"></div>
	<div class="color-mode">
		<label>
			<span>Header</span>
			<select class="header-option m-wrap small">
				<option value="fixed" selected>Fixed</option>
				<option value="default">Default</option>
			</select>
		</label>
		<label>
			<span>Footer</span>
			<select class="footer-option m-wrap small">
				<option value="fixed" selected>Fixed</option>
				<option value="default">Default</option>
			</select>
		</label>
	</div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->  
<!-- BEGIN PAGE HEADER-->
<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			<?= $title ?> <small><?= !empty($title_) ? $title_ : '' ?></small>
		</h3>
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="<?= base_url('systemset/index') ?>">后台首页</a> 
				<i class="icon-angle-right"></i>
			</li>
			<?php if(isset($nav)&&!empty($nav)){?>
			<?php foreach($nav as $key=>$value){?>
			<li>
				<?php if(isset($value['url'])&&!empty($value['url'])){?>
				<a href="<?= base_url() . $value['url'] ?>"><?= $value['title'] ?></a>
				<i class="icon-angle-right"></i>
				<?php }else{ ?>
				<?= $value['title'] ?> 
				<?php } ?>
			</li>
			<?php } ?>
			<?php } ?>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->