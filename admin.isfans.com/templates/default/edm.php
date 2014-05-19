<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<form action='http://admin.isfans/author/get' method='post'>
<input type='text' name='myt' id="myt"><input type='submit' id='myb' value='send'>
</form>
<script>
$(document).ready(function(){
	$("#myb").click(function(){
		var myt = $("#myt").val();
		alert(myt);
	});
});
</script>