<?php echo $header;?>
		<div id="loginbox"> 
        	<div class="control-group normal_text"> <h3><img src="" alt="推广我自己" width="100"></h3></div>           
            <div id="loginform" class="form-vertical">
				<div class="control-group normal_text"> <h3><img src="<?php echo base_url();?>themes/isfans/img/main-logo.png" alt="微信助理"></h3></div>
                <div id='errormsg'></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="用户名" name="username" id="username">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="密码" name="password" id="password">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码</a></span>
                    <span class="pull-right"><a type="submit" class="btn btn-success"> 登录</a></span>
                </div>
            </div>          
        </div>
<?php echo $footer;?>