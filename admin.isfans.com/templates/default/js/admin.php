$(document).ready(function(){
	$("#admin_save").click(function(){
		var ckusername = /^([a-zA-Z0-9_])*$/;
		var ckemail = /\S+@\S+\.\S+/;
		var username = $("#username").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var repassword = $("#repassword").val();
		var role = $("#role").val();
		var admin_id = $("#admin_id").val();
		var errormsg = '';
		var page = $("#page").val();
		
		$("#admin_username").html('');
		$("#admin_email").html('');
		$("#admin_password").html('');
		$("#admin_role").html('');
		
		if(username.length<1){
			$("#admin_username").html('<?php echo $error['admin_usernamenull'];?>');
			errormsg = '<?php echo $error['admin_usernamenull'];?>';
		}
		if(!ckusername.test(username)){
			$("#admin_username").html('<?php echo $error['admin_usernameformat'];?>');
			errormsg += '<?php echo $error['admin_usernameformat'];?>';
		}
		if(email.length<1){
			$("#admin_email").html('<?php echo $error['admin_emailnull'];?>');
			errormsg += '<?php echo $error['admin_emailnull'];?>';
		}
		if(!ckemail.test(email)){
			$("#admin_email").html('<?php echo $error['admin_emailformat'];?>');
			errormsg += '<?php echo $error['admin_emailformat'];?>';
		}
		if(admin_id==0){
			if(password.length<1){
				$("#admin_password").html('<?php echo $error['admin_passwordnull'];?>');
				errormsg += '<?php echo $error['admin_passwordnull'];?>';
			}
			if(password!=repassword){
				$("#admin_password").html('<?php echo $error['admin_repassword'];?>');
				errormsg += '<?php echo $error['admin_repassword'];?>';
			}
		}else{
			
			if(password!=repassword){
				$("#admin_password").html('<?php echo $error['admin_repassword'];?>');
				errormsg += '<?php echo $error['admin_repassword'];?>';
			}
		}
		
		
		if(!role){
			$("#admin_role").html('<?php echo $error['admin_role'];?>');
			errormsg += '<?php echo $error['admin_role'];?>';
		}
		if(!errormsg){
			$.ajax({
				type:'post',
				url:'<?php echo base_url('admin/editpost');?>',
				dataType:'json',
				data:{
					username:username,
					email:email,
					password:password,
					role:role,
					admin_id:admin_id,
					page:page
				},
				success:function(data){
					console.log(data);
					if(data.flag){
						location.href=data.href;
						//console.log(data);
					}else{
						$("#errormsg").html(data.msg);
					}
				}
			});
		}
	});
	$("#username").blur(function(){
		var username = $("#username").val();
		var admin_id = $("#admin_id").val();
		$("#admin_username").html('');
		if(username){
			$.ajax({
				type:'post',
				url:'<?php echo base_url('admin/checkusername');?>',
				dataType:'json',
				data:{
					username:username,
					admin_id:admin_id
				},
				success:function(data){
					if(data.flag){
						$("#admin_username").html(data.msg);
					}
				}
			});
		}
	});
});