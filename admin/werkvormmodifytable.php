<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0;URL='werkvormlist.php'">
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




$werkvormid = $_GET["id"];
$werkvorm = mysqli_real_escape_string($link, $_POST['werkvorm']);

 
// attempt insert query execution
$sql = "update werkvormen set werkvorm='$werkvorm'
        where werkvormid = '$werkvormid'";


if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
    echo "<a href='werkvormlist.php'>Lijst</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<a href='werkvormlist.php'>Lijst</a>";
}
 
// close connection
mysqli_close($link);

?>


</body>
</html>