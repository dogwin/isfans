<!-- jcrop -->
<link rel="stylesheet" href="<?php echo base_url();?>asset/jcrop/css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css" type="text/css" />
<div class='showimg'>
	<img src='<?php echo base_url();?>asset/images/0915030.jpg' id='photo' >
</div>


<input type='button' id='go' class='refresh'>

<input type='file' id='upload' name='upload'>
<input type='button' id='save' value='save'>

<script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
<!-- Rotate -->
<script src="<?php echo base_url();?>asset/js/jQueryRotate.js"></script>
<!-- jcrop js -->
<script src="<?php echo base_url();?>asset/jcrop/js/jquery.Jcrop.js"></script>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image resize plugin -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/jquery.fileupload-resize.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url();?>assets/JQueryupload/js/jquery.fileupload-ui.js"></script>
<script>
	var rotation = 0;
	var oldw =0;
	$("#go").live('click',function(){
		rotation = (rotation + 90) % 360;
		$("body").find("#photo").rotate(rotation);
		var imgsrc = $("#photo").attr('src');
		//console.log(rotation);
		var imgw = $("#photo").width();

		//

		console.log(imgw);
		if(rotation%180){
			//
			oldw = imgw;
			var hb = 90000/imgw;
			console.log(hb);
			$("#photo").css('width','300px');
			$("#photo").css('height',hb);
		}else{
			$("#photo").css('height','300px').css('width',oldw);
			
		}
		$.ajax({
			type:'POST',
			url:'action.php?act=save',
			cache:false,
			dataType:'json',
			data:{
				rotation:rotation,
				imgsrc:imgsrc
			},
			success:function(data){
				console.log(data);
				if(data.flag){
					//goto 
				}else{
					$("#errormsg").html(data.msg);
				}
				
			},
			error: function(){
				//请求出错处理
				console.log('err');
			}
		});
	});
	$("#upload").fileupload({
			url:'action.php?act=upload',
			autoUpload: true,
			dataType:'json',
			//fileInput:$('input:file'),
			add: function (e, data) {
				//loading gif 
				$("#photo").attr('src','images/ajax-loader.gif');
		        //data.submit();
				var jqXHR = data.submit()
	            .success(function (result, textStatus, jqXHR) {
	                //console.log(result);
	                //console.log(textStatus);
	                //console.log(jqXHR);
	                if(result.flag){
	                    $("#photo").attr('src',result.imagesrc);
	                }else{
	                    alert(result.msg);
	                }
	            })
	            .error(function (jqXHR, textStatus, errorThrown) {
	            	//console.log("error==>");
	            	//console.log(jqXHR);
	                //console.log(textStatus);
	                //console.log(errorThrown);
	            })
	            .complete(function (result, textStatus, jqXHR) {
	            });
		    }
		});
</script>