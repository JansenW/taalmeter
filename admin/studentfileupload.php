<?php include 'include/secureHeader.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Taalmeter">
    <meta name="author" content="wjansen">

    <title>Taalmeter</title>

    <!-- Bootstrap Core CSS -->
    <?php include 'include/cssstart.php'; ?>
</head>

<body>
<?php include 'include/navigationstudent.php';
            include 'include/constants.inc.php';
      ?>
<div id="wrapper">

<div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Bestand opgeladen</h2>
        </div>
          <!-- /.col-lg-12 -->
      </div>

      <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
            <div class="panel-heading">
              Status
            </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables">
    <thead>
    <tr>
      <th>Cursist</th>
      <th>Status</th>
    </tr>  
    </thead>  
    <tbody>



<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

 
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = 'studenten.xlsx'; 

try {
  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
  die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$last_name = trim($allDataInSheet[$i]["A"]);
$first_name = trim($allDataInSheet[$i]["B"]);
$date_of_birth = substr(trim($allDataInSheet[$i]["C"]),6,4)."-".substr(trim($allDataInSheet[$i]["C"]),3,2)."-".substr(trim($allDataInSheet[$i]["C"]),0,2);
$nationality = trim($allDataInSheet[$i]["D"]);
$mobile_number = trim($allDataInSheet[$i]["E"]);
$stamnummer = trim($allDataInSheet[$i]["F"]);
$street = "";
$postcode = "";
$commune = "";
$phone = "";
$email = "";



$query = "SELECT StudentNumber FROM student WHERE StudentNumber = '$stamnummer'";
$sql = mysqli_query($link,$query);
$numberRows = mysqli_num_rows($sql); ?>
<tr>
  <td>
    <?php 
      echo $stamnummer;
    ?>
  </td>
  <td>

<?php
if($numberRows==0) {

$sql = "INSERT INTO student (StudentNumber,FirstName, LastName, DateOfBirth, Nationality, street, PostCode, commune, MobileNumber, email, TelephoneNumber) 
        VALUES ('$stamnummer', '$first_name', '$last_name', '$date_of_birth', '$nationality','$street','$postcode','$commune','$mobile_number','$email','$phone')";


if(mysqli_query($link, $sql)){
    $msg = "Student succesvol toegevoegd.";
} else{
    $msg =  "ERROR: " . mysqli_error($link);
}
} else {
  $sql = "update student set FirstName='$first_name', LastName='$last_name', DateOfBirth='$date_of_birth', Nationality='$nationality', street='$street', PostCode='$postcode', 
          commune='$commune', MobileNumber='$mobile_number', email='$email', TelephoneNumber='$phone'
          where StudentNumber = '$stamnummer'";

  if(mysqli_query($link, $sql)){
    $msg = "Student succesvol aangepast.";
} else{
    $msg =  "ERROR: " . mysqli_error($link);
}
}


echo $msg."</td></tr>";
} 

?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>
</html>