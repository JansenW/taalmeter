<?php include 'include/secureHeader.php'; ?>
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
  <br>


<?php


//create a database connection
include 'include/constants.inc.php';

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$cursuscode = $_GET["cursuscode"];

$username = $_GET["id"];

$action = $_GET["action"];

if ($action == "D")
{ 
  $sql = "delete from teacherclasses where cursuscode = '$cursuscode' and username = '$username'";
  if(mysqli_query($link, $sql)){
    echo "Records removed successfully.";
  } 
  else
  {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
  mysqli_close($link);

  header("location:usermodify.php?id=$username"); 
}
if ($action == "R")
{
  $encrypted_mypassword=md5("sopro");
  $sql = "update members set password = '$encrypted_mypassword' where username = '$username'";
  if(mysqli_query($link, $sql)){
    echo "Pasword reset.";
    $_SESSION['result'] = "ok";
  } 
  else
  {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    $_SESSION['result'] = "nok";
  }
  header("location:usermodify.php?id=$username");
  mysqli_close($link);
  header("location:usermodify.php?id=$username");
}
if ($action == "M")
{
  $usernamenew = mysqli_real_escape_string($link, $_POST['username']);
  $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
  $type = mysqli_real_escape_string($link, $_POST['type']);

  if ($type == 'admin')
  {
    $type = 1;
  }
  else
  {
    $type = 2;
  }

 
// attempt insert query execution
$sql = "update members set username='$usernamenew', lastname='$lastname', firstname='$firstname', type=$type
        where username = '$username'";
  if(mysqli_query($link, $sql)){
    echo "Updated.";
  } 
  else
  {
    echo "Not updated. " . mysqli_error($link);
  }
  header("location:userlist.php");
}
  mysqli_close($link);

 // close connection


?>


</body>
</html>