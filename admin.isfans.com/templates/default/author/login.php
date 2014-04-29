<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
		<meta charset="UTF-8" />
        <title><?php echo setting('backend_title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/default/media/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url() ?>asset/default/media/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>asset/default/media/css/matrix-login.css" />
        <link href="<?= base_url() ?>asset/default/media/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            	
				<div class="control-group normal_text"> <h3><img src="<?= base_url() ?>asset/default/media/img/logo.png" alt="Logo" /></h3></div>
				<div id='errormsg'></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="username" id="username" type="text" placeholder="用户名" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" id="password" type="password" placeholder="密码" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="button" class="btn btn-success" id="loginbt" value='登录'/></span>
                </div>
        </div>
        
        <script src="<?= base_url() ?>asset/default/media/js/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url();?>isfansjs/author" type="text/javascript" language="php"></script> 
    </body>

</html>