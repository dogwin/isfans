<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="zh-CN" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="zh-CN" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="zh-CN"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>
<title><?php echo setting('backend_title'); ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="<?= base_url()?>asset/default/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url()?>asset/default/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url()?>asset/default/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url()?>asset/default/media/css/style-metro.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url()?>asset/default/media/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url()?>asset/default/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url()?>asset/default/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?= base_url()?>asset/default/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<?php
$data_hcjf = $this->_data_hcjf;
if(isset($data_hcjf['css'])&&!empty($data_hcjf['css'])){
	foreach($data_hcjf['css'] as $value){
		echo '<link rel="stylesheet" type="text/css" href="' . $value . '" />'."\n";
	}
}
?>
<link href="<?= base_url()?>asset/default/media/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<script src="<?= base_url()?>asset/default/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>asset/default/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?= base_url()?>asset/default/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="<?= base_url()?>asset/default/media/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?= base_url()?>asset/default/media/js/excanvas.min.js"></script>
<script src="<?= base_url()?>asset/default/media/js/respond.min.js"></script>  
<![endif]-->   
<script src="<?= base_url()?>asset/default/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>asset/default/media/js/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="<?= base_url()?>asset/default/media/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>asset/default/media/js/jquery.uniform.min.js" type="text/javascript" ></script>
<?php
if(isset($data_hcjf['pl'])&&!empty($data_hcjf['pl'])){
	foreach($data_hcjf['pl'] as $value){
		echo '<script src="' . $value . '"></script>'."\n";
	}
}
?>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed page-footer-fixed">

	<!-- BEGIN HEADER -->
	
	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?= base_url()?>">
				<img src="<?= base_url()?>asset/default/media/img/logo.png" alt="logo" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="<?= base_url()?>asset/default/media/image/menu-toggler.png" alt="" />
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav pull-right">
					<!-- BEGIN INBOX DROPDOWN -->
					<!--<li class="dropdown" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-envelope"></i>
						<span class="badge">5</span>
						</a>
						<ul class="dropdown-menu extended inbox">
							<li>
								<p>You have 12 new messages</p>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo"><img src="media/image/avatar1.jpg" alt="" /></span>
								<span class="subject">
								<span class="from">Bob Nilson</span>
								<span class="time">2 hrs</span>
								</span>
								<span class="message">
								Vivamus sed nibh auctor nibh congue nibh. auctor nibh
								auctor nibh...
								</span>  
								</a>
							</li>
							<li class="external">
								<a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
							</li>
						</ul>
					</li>-->
					<!-- END INBOX DROPDOWN -->
					<li class="user">
						<a href="<?php echo base_url('author/logout'); ?>">
						<i class="icon icon-share-alt"></i>
						<span>退出</span>
						</a>
					</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="<?= base_url()?>asset/default/media/image/avatar1_small.jpg" />
						<span class="username">欢迎 <?php echo $this->_admin->username; ?></span>
							<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo backend_url('system/password'); ?>"><i class="icon-user"></i>修改密码</a></li>
							<!--<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
							<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
							-->
							<li class="divider"></li>
							<li><a href="<?php echo backend_url('login/quit'); ?>"><i class="icon-lock"></i>锁定</a></li>
							<li><a href="<?php echo backend_url('login/quit'); ?>"><i class="icon-key"></i>退出</a></li>

						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU --> 
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="start <?php if($this->uri->rsegment(1)=='systemset'&&$this->uri->rsegment(2)=='index'){echo 'active';}?>">
					<a href="<?= base_url('systemset/index')?>">
					<i class="icon-home"></i> 
					<span class="title">后台首页</span>
					<?php if($this->uri->rsegment(1)=='systemset'&&$this->uri->rsegment(2)=='index'){?>
					<span class="selected"></span>
					<span class="arrow"></span>
					<?php }?>
					</a>
				</li>
				<?php $this->acl->show_left_menus(); ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<?php if($this->uri->rsegment(1) != 'module'): ?>
		    <?php $this->load->view(isset($tpl) && $tpl ? $tpl : 'sys_default'); ?>
		    <?php else: ?>
		    <?php if(!isset($msg)){echo $content;}else{$this->load->view($tpl);} ?>
		    <?php endif; ?>     
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			<?= "2013-".date('Y',time())?> &copy; 如来实义
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->

<script type="text/javascript">
	var site_url = "<?= base_url()?>";
</script>
<script src="<?= base_url()?>asset/default/media/js/app.js"></script>
<script src="<?= base_url()?>asset/default/media/js/table-managed.js"></script>
<?php
if(isset($data_hcjf['js'])&&!empty($data_hcjf['js'])){
	foreach($data_hcjf['js'] as $value){
		echo '<script src="' . $value . '"></script>'."\n";
	}
}
?>
<script>

	jQuery(document).ready(function() {       
	   App.init();
	   TableManaged.init();
<?php
if(isset($data_hcjf['init'])&&!empty($data_hcjf['init'])){
	foreach($data_hcjf['init'] as $value){
		echo $value."\n";
	}
}
?>
	});

</script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37564768-1']);
    _gaq.push(['_setDomainName', 'keenthemes.com']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']); (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://': 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>
</body>
</html>
