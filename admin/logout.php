<?php

session_start();
session_destroy();
$_SESSION['myusername'] = NULL;
$_SESSION['type'] = NULL;

header("location:../index.html");

?>
