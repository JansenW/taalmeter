<?php
	session_start();
	if ((isset($_SESSION['type']) && $_SESSION['type'] == 1)){
		
	}
	else
	{
		header("location:../index.html");
	}
?>