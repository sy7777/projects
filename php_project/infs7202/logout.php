<?php
	session_start();
	unset($_SESSION['Username']);
	
	if(session_destroy())
	{
		header("Location: login.php");
	}
?>