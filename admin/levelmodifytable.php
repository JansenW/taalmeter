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


$levelid = $_GET["id"];
$level = mysqli_real_escape_string($link, $_POST['level']);
$departmentcode = mysqli_real_escape_string($link, $_POST['departmentcode']);
$weighttalking = mysqli_real_escape_string($link, $_POST['weighttalking']);
$weightwriting = mysqli_real_escape_string($link, $_POST['weightwriting']);
$weightreading = mysqli_real_escape_string($link, $_POST['weightreading']);
$weightlistening = mysqli_real_escape_string($link, $_POST['weightlistening']);

 
// attempt insert query execution
$sql = "update level set level='$level', departmentcode='$departmentcode', weighttalking='$weighttalking', weightwriting='$weightwriting', 
        weightreading='$weightreading', weightlistening='$weightlistening'
        where levelid = '$levelid'";


if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
    echo "<a href='niveaulist.php'>Lijst</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<a href='niveaulist.php'>Lijst</a>";
}
 
// close connection
mysqli_close($link);


header("location:levellist.php");

?>


</body>
</html>