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

$StudentNumber = $_GET["StudentNumber"];

 
// attempt insert query execution
$sql = "delete from studentklas where cursuscode = '$cursuscode' and StudentNumber = '$StudentNumber'";


if(mysqli_query($link, $sql)){
    echo "Records removed successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);

header("location:klasconsult.php?id=$cursuscode");

?>


</body>
</html>