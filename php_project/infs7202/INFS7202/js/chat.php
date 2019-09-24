<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lets Chat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/chat.css" rel="stylesheet" type='text/css' media="all" />
<?php
include('server.php');
session_start();
if(isset($_SESSION['username'])) {}
else{
  header('location:chat.php');
  }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function()
    {
        $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#my_form').submit();
				 $('#comment').val("");
             }
        });
	});
</script>
<script type="text/javascript">
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'commentajax.php',
      data: 
      {
      user_comm:comment,
	   user_name:name,
      }
      success: function (response) 
      {
	    document.getElementById("comment").value="";
      }
    });
  }
  
  return false;
}
</script>
<script>
 function autoRefresh_div()
 {
      $("#result").load("load.php").show();// a function which will load data from other file after x seconds
  }
 
  setInterval('autoRefresh_div()', 2000);
</script>
</head>

<body>
<div id="logout">
	<a href="logout.php" style="text-decoration:none"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
</div>

<div id="container">

<div id="session-name">
	Your Name: <input type="text" value="<?= $_SESSION['username'] ?>" class="session-text" disabled>
</div>

<div id="result-wrapper">
	<div id="result">
		<?php
			include("load.php");
		?>
	</div>			
</div>

<form method='post' action="chat.php" onsubmit="return post();" id="my_form" name="my_form">
<div id="form-container">
	<div class="form-text">
    	<input type="text" style="display:none" id="username" value="<?= $_SESSION['username'] ?>">
    	<textarea id="comment"></textarea>
    </div>
    <div class="form-btn">
    	<input type="submit" value="Send" id="btn" name="btn"/>
    </div>
</div>
</form>

</div>
</body>
</html>