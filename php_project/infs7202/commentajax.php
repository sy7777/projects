<?php

include("connection.php");

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $Username=$_POST['user_name'];
  $insert=mysqli_query($db,"INSERT INTO comments (Username,comment,post_time) VALUES('$Username','$comment',CURRENT_TIMESTAMP)");
}

?>