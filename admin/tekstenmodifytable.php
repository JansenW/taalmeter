<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0;URL='tekstenlist.php'">
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




$tekstid = $_GET["id"];
$tekst = mysqli_real_escape_string($link, $_POST['tekst']);
$tekstsoort = mysqli_real_escape_string($link, $_POST['tekstsoort']);

 
// attempt insert query execution
$sql = "update teksten set tekst='$tekst', tekstsoort='$tekstsoort'
        where tekstid = '$tekstid'";


if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
    echo "<a href='tekstenlist.php'>Lijst</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<a href='tekstenlist.php'>Lijst</a>";
}
 
// close connection
mysqli_close($link);

?>


</body>
</html>