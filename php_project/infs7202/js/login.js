$(document).ready(function(){
	$("#Login").click(function(){
		var Username=$("#Username").val();
		var Password=$("#Password").val();
		var data="Username="+Username+"&Password="+Password;
			$.ajax({
				type:"POST",
				url:"server.php",
				data: data,
				success:function(data){
					$("#login_error").html(data);
				}
			});
	});
});