$(document).ready(function(){
	$("#menus_save").click(function(){
		var errorMsg = '';
		var menu_parent = $("#menu_parent").val();
		var menu_name = $("#menu_name").val();
		var class_name = $("#class_name").val();
		var method_name = $("#method_name").val();
		var menu_level = $("#menu_level").val();
		
		if(menu_parent.length<1){
			$("#M_menu_parent").html('<?php echo $MN_Parent;?>');
			errorMsg = '<?php echo $MN_Parent;?>';
		}
		if(menu_name.length<1){
			$("#M_menu_name").html('<?php echo $MN_Menuname;?>');
			errorMsg += '<?php echo $MN_Menuname;?>';
		}
		if(class_name.length<1){
			$("#M_class_name").html('<?php echo $MN_Classname;?>');
			errorMsg += '<?php echo $MN_Classname;?>';
		}
		if(method_name.length<1){
			$("#M_method_name").html('<?php echo $MN_Methodname;?>');
			errorMsg += '<?php echo $MN_Methodname;?>';
		}
		if(menu_level.length<1){
			$("#M_menu_level").html('<?php echo $MN_Level;?>');
			errorMsg += '<?php echo $MN_Level;?>';
		}
		if(!errorMsg){
		}
	});
});


