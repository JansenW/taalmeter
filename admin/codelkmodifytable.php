<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0;URL='codelklist.php'">
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

$link = open_database_connection();




$value = $_GET["id"];
$code = mysqli_real_escape_string($link, $_POST['code']);
$referentiecursus = mysqli_real_escape_string($link, $_POST['referentiecursus']);
$referentiemap = mysqli_real_escape_string($link, $_POST['referentiemap']);
$vrij = mysqli_real_escape_string($link, $_POST['vrij']);

 
// attempt insert query execution
$sql = "update codeleerkracht set code='$code', referentiecursus='$referentiecursus', referentiemap='$referentiemap', vrij='$vrij'
        where code = '$value'";


if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
    echo "<a href='codelklist.php'>Lijst</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<a href='codelklist.php'>Lijst</a>";
}
 
// close connection
mysqli_close($link);

?>


</body>
</html>