$(document).ready(function(){
	//loginbt
	$("#loginbt").click(function(){
		login();
	});
});
function login(){
	var username = $("#username").val();
	var password = $("#password").val();
	var errormsg = '';
	if(username.length<1){
		errormsg = '<?php echo $error['UN_NULL']?>';
	}
	if(password.length<1){
		errormsg += '<br><?php echo $error['PS_NULL']?>';
	}
	if(errormsg){
		$("#errormsg").html(errormsg);
	}else{
		$.ajax({
			type:'POST',
			url:'<?php echo base_url("post/login");?>',
			cache:false,
			dataType:'json',
			data:{
				username:username,
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
