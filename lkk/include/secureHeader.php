<?php
	session_start();
	if ((isset($_SESSION['type']) && $_SESSION['type'] == 2)){
		$username = $_SESSION['myusername'];		
	}
	else
	{
		header("location:../index.html");
	}
?>