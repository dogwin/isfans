$(document).ready(function(){
	$("#menus_save").click(function(){
		var errorMsg = '';
		var menu_id = $("#menu_id").val();
		var menu_parent = $("#menu_parent").val();
		var menu_name = $("#menu_name").val();
		var class_name = $("#class_name").val();
		var method_name = $("#method_name").val();
		var menu_level = $("#menu_level").val();
		var page = $("#page").val();
		if(menu_parent.length<1){
			$("#M_menu_parent").html('<?php echo $error['MN_Parent'];?>');
			errorMsg = '<?php echo $error['MN_Parent'];?>';
		}
		if(menu_name.length<1){
			$("#M_menu_name").html('<?php echo $error['MN_Menuname'];?>');
			errorMsg += '<?php echo $error['MN_Menuname'];?>';
		}
		if(class_name.length<1){
			$("#M_class_name").html('<?php echo $error['MN_Classname'];?>');
			errorMsg += '<?php echo $error['MN_Classname'];?>';
		}
		if(method_name.length<1){
			$("#M_method_name").html('<?php echo $error['MN_Methodname'];?>');
			errorMsg += '<?php echo $error['MN_Methodname'];?>';
		}
		if(menu_level.length<1){
			$("#M_menu_level").html('<?php echo $error['MN_Level'];?>');
			errorMsg += '<?php echo $error['MN_Level'];?>';
		}
		if(!errorMsg){
			$.ajax({
				type:'post',
				url:'<?php echo base_url('post/menuEdit');?>',
				dataType:'json',
				data:{
					menu_id:menu_id,
					menu_parent:menu_parent,
					menu_name:menu_name,
					class_name:class_name,
					method_name:method_name,
					menu_level:menu_level,
					page:page
				},
				success:function(data){
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
});


