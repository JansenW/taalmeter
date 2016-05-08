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




$StudentNumber = $_GET["id"];
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
$sql = "update student set FirstName='$first_name', LastName='$last_name', DateOfBirth='$date_of_birth', Nationality='$nationality', street='$street', PostCode='$postcode', 
        commune='$commune', MobileNumber='$mobile_number', email='$email', TelephoneNumber='$phone'
        where StudentNumber = '$StudentNumber'";


if(mysqli_query($link, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);

header("location:studentlist.php");

?>


</body>
</html>