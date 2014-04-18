$(document).ready(function(){
	$("#loginform .btn-success").click(function(){
	});
});
function login(){
	var errormsg = '';
	var username = $("#username").val();
	var password = $("#password").val();
	if(username.length<1){
		errormsg = '<?php echo $loginError['usernameNull'];?>';
	}
	if(password.length<1){
		errormsg = '<?php echo $loginError['passwordNull'];?>';
	}
	if(errormsg){
		$("#errormsg").html(errormsg);
	}else{
		$("#errormsg").html('');
		$.ajax({
				type:'POST',
				url:'<?php echo base_url("post/login");?>',
				cache:false,
				dataType:'json',
				data:{
					username:username
					password:password
				},
				/*beforeSend:function(){
					console.log('posting.....');
				},*/
				success:function(data){
					console.log(data);
					if(data.flag){
						location.href=data.redirect;
					}else{
						$("#errormsg").html(data.msg);
					}
				},
				/*complete: function(XMLHttpRequest, textStatus){
					console.log('ff');
				},*/
				error: function(){
					//请求出错处理
					console.log('err');
				}
		});
	}
}