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
<?php include 'include/navigationklas.php';
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
      <th>Klas</th>
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
$inputFileName = 'studentklas.xlsx'; 

try {
  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
  die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++)
{
$schooljaar = trim($allDataInSheet[$i]["A"]);
$cursusnaam = trim($allDataInSheet[$i]["B"]);
$stamnummer = trim($allDataInSheet[$i]["C"]);
$msg = "";

$query = "SELECT StudentNumber FROM studentklas WHERE StudentNumber = '$stamnummer' and cursuscode in
          (SELECT cursuscode from klassen where cursusnaam = '$cursusnaam' and schooljaar = '$schooljaar')";
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
      echo $cursusnaam;
      echo " - ";
      echo $schooljaar;
    ?>
  </td>
  <td>

<?php
if($numberRows==0) 
{
  $numberStudent=0;
  $querystudent = "SELECT StudentNumber from student where StudentNumber = '$stamnummer'";
  $sqlstudent = mysqli_query($link,$querystudent);
  
  $numberStudent = mysqli_num_rows($sqlstudent);
  $queryCursus = "SELECT cursuscode from klassen where cursusnaam = '$cursusnaam' and schooljaar = '$schooljaar'";
  $sqlCursus = mysqli_query($link,$queryCursus);
  
  $numberCursus = mysqli_num_rows($sqlCursus);
  if($numberStudent!=0 and $numberCursus!=0) 
  {
    while ($rowCursus = mysqli_fetch_array($sqlCursus))
    { 
      $cursuscode = $rowCursus['cursuscode'];
      $sql = "INSERT INTO studentklas (StudentNumber,cursuscode) 
              VALUES ('$stamnummer', '$cursuscode')";
      if(mysqli_query($link, $sql))
      {
        $msg .= "Cursist succesvol toegevoegd aand de klas.<br>";
      } else 
      {
        $msg .=  "ERROR: " . mysqli_error($link)."<br>";
      }
    }
  } else 
  {
    if ($numberStudent==0) 
    {
      $msg .= "De cursist bestaat nog niet, voeg deze eerst toe.<br>";
    }
    if ($numberCursus==0) 
    {
      $msg .= "De cursus bestaat nog niet, voeg deze eerst toe.<br>";
    }
  }
} else 
{
    $msg .= "Cursist is al toegevoegd aan de klas.<br>";
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