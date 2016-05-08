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


$level = mysqli_real_escape_string($link, $_POST['level']);
$departmentcode = mysqli_real_escape_string($link, $_POST['departmentcode']);
$weighttalking = mysqli_real_escape_string($link, $_POST['weighttalking']);
$weightwriting = mysqli_real_escape_string($link, $_POST['weightwriting']);
$weightreading = mysqli_real_escape_string($link, $_POST['weightreading']);
$weightlistening = mysqli_real_escape_string($link, $_POST['weightlistening']);

 
// attempt insert query execution
$sql = "INSERT INTO level (level, departmentcode, weighttalking, weightwriting, weightreading, weightlistening) 
        VALUES ('$level', '$departmentcode', '$weighttalking', '$weightwriting', '$weightreading', '$weightlistening')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    echo "<a href='niveaulist.php'>Lijst</a><br><a href='niveauadd.php'>Add</a>";
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