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

$username = $_GET["id"];

$cursuscode = $_GET["cursuscode"];;

 
// attempt insert query execution
$sql = "INSERT INTO teacherclasses (username, cursuscode) 
        VALUES ('$username','$cursuscode')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);

header("location:userclassadd.php?id=$username");

?>


</body>
</html>