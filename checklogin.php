<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
</head>
<body>

 
  <br>
  <br>
  <br>  
  <br>
  test
  <br>


<?php

echo "ok2";

//create a database connection
include 'include/constants.inc.php';

// Connect to server and select databse.
$link = mysqli_connect("$DB_HOST", "$DB_USER", "$DB_PASS", "$DB_NAME"); 

// username and password sent from form 
$myusername=$_POST['email']; 
$mypassword=$_POST['password']; 

$encrypted_mypassword=md5($mypassword);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$myusername = mysqli_real_escape_string($link, $myusername);
$sql="SELECT type, username FROM members WHERE username='$myusername' and password='$encrypted_mypassword'";
$result=mysqli_query($link, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}


$row_cnt = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($row_cnt == 1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$row=mysqli_fetch_array($result);
$_SESSION['myusername'] = $row['username'];
$_SESSION['type'] = $row['type'];
if ($row['type'] == 1){
  header("location:admin/dashboard.php");
}
else
{
 header("location:lkk/dashboard.php"); 
}
}
else {
echo "Wrong Username or Password";
header("location:index.html");
}

mysqli_close($link);

?>


</body>
</html>