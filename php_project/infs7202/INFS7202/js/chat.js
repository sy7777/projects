$(document).ready(function(){
	$("#send").click(function(){
		var comment = $("#comment").value;
  		var Username = $("#Username").value;
  		var data = "Username="+Username+"&comment="+comment;
  if(comment && name){
    $.ajax({
      type: 'POST',
      url: 'commentajax.php',
      data: data,
      success: function (response){
	    $("#comment").value="";
      }
    });
  } 
  return false;
})
});