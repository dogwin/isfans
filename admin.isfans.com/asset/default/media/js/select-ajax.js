$("document").ready(function(){
	var url = location.protocol + '//' + location.host;
	$("#country_id").change(function(){
		var cID = $(this).val();
		if(!cID){
			alert('请选择国家');
		}else{
			$.ajax({
				type:'POST',
				url:url+"/admin/area_city/proselect",
				cache:false,
				dataType:'json',
				data:"&cID="+cID+'&xiaotangcai_csrf_test_name='+ getCookie('xiaotangcai_csrf_cookie_name'),
				success:function(data){
					
					console.log(data);
					if(data.flag){
						var proSlt = '';//'<select id="province_id" name="province_id">';
						//location.href=data.redirect;
						
						for(key in data.select){
							//console.log(key);
							//console.log(data.select[key]);
							proSlt+='<option value="'+key+'">'+data.select[key]+'</option>';
						}
						//proSlt+='</select>';
						console.log(proSlt);
						$("#provinceSelect").find("#province_id").empty().append(proSlt);
					}else{
						//$("#errormsg").html(data.msg);
					}
					
				},
			});
		}
	});
});