$(document).ready(function(){

	var login = $('#loginform');
	var recover = $('#recoverform');
	var speed = 400;
	var submit = true;

	$('#to-recover').click(function(){
		
		$("#loginform").slideUp();
		$("#recoverform").fadeIn();
	});
	$('#to-login').click(function(){
		
		$("#recoverform").hide();
		$("#loginform").fadeIn();
	});
	
	
	$('#loginbox .btn-success').click(function(){
		$('input[placeholder]').each(function(){ 
	        	var input = $(this);       
		       	if($(input).val()==""){
		       		alert(input.attr('placeholder') + "必须输入");
		       		submit = false;
		       		return false;
		       	}
		});
		if(submit){
		    	$('#loginform').submit();
		}
	});
	$('input[placeholder]').each(function(){ 
		var $input = $(this);       
		$input.bind('keydown', function (e) {
            var key = e.which;
            if (key == 13) {
            	if($input.attr("placeholder")=="密码"){
            		$('#loginbox .btn-success').click();
            	}else{
            		var nxtIdx = $input.index(this) + 1;
            		 $("input:eq(" + nxtIdx + ")").focus();
            	}
            }
        });
	});
	 
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
        var input = $(this);       
       
        $(input).val(input.attr('placeholder'));
               
        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });
       
        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });
    }
});