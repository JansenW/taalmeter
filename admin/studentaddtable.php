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

$stamnummer = mysqli_real_escape_string($link, $_POST['stamnummer']);
$first_name = mysqli_real_escape_string($link, $_POST['firstname']);
$last_name = mysqli_real_escape_string($link, $_POST['lastname']);
$date_of_birth = mysqli_real_escape_string($link, $_POST['dateofbirth']);
$nationality = mysqli_real_escape_string($link, $_POST['nationality']);
$street = mysqli_real_escape_string($link, $_POST['street']);
$postcode = mysqli_real_escape_string($link, $_POST['postcode']);
$commune = mysqli_real_escape_string($link, $_POST['commune']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$mobile_number = mysqli_real_escape_string($link, $_POST['mobilenumber']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);

 
// attempt insert query execution
$sql = "INSERT INTO student (StudentNumber,FirstName, LastName, DateOfBirth, Nationality, Street, PostCode, Commune, MobileNumber, Email, TelephoneNumber) 
        VALUES ('$stamnummer', '$first_name', '$last_name', '$date_of_birth', '$nationality','$street','$postcode','$commune','$mobile_number','$email','$phone')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    echo "<a href='studentlist.php'>Lijst</a><br><a href='studentenadd.php'>Add</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<a href='studentlist.php'>Lijst</a>";
}
 
// close connection
mysqli_close($link);

header("location:studentlist.php");

?>


</body>
</html>