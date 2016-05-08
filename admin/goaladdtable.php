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

$learninggoal = mysqli_real_escape_string($link, $_POST['learninggoal']);
$skill = mysqli_real_escape_string($link, $_POST['skill']);
$level = mysqli_real_escape_string($link, $_POST['level']);

$sqlselect = "SELECT levelid from level where level = '$level'";

$result = mysqli_query($link, $sqlselect);

$row = mysqli_fetch_array($result);

 
// attempt insert query execution
$sql = "INSERT INTO goal (learninggoal, skill, levelid) 
        VALUES ('$learninggoal', '$skill', '$row[levelid]')";


if(mysqli_query($link, $sql)){
    echo "Record toegevoegd.";
} else{
    echo "ERROR tijdens het toevoegen van de leerplandoelstelling: $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);

header("location:goallist.php");

?>


</body>
</html>