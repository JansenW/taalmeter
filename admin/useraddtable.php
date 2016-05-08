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

$username = mysqli_real_escape_string($link, $_POST['username']);
$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
$type = mysqli_real_escape_string($link, $_POST['type']); 
if ($type == 'admin')
{
  $type = 1;
}
else
{
  $type = 2;
}
$encrypted_mypassword=md5("sopro");


 
// attempt insert query execution
$sql = "insert into members(username, lastname, firstname, type, password)
        values ('$username', '$lastname','$firstname',$type, '$encrypted_mypassword')";
  if(mysqli_query($link, $sql)){
    echo "inserted.";
  } 
  else
  {
    echo "Not inserted. " . mysqli_error($link);
  }
  header("location:userlist.php");
// close connection
mysqli_close($link);

?>


</body>
</html>