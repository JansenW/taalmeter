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
      <th>Klas</th>
      <th>Status</th>
    </tr>  
    </thead>  
    <tbody>



<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$databasetable = "klassen";
 
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = 'klas.xlsx'; 

try {
  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
  die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

$centrumnaam = trim($allDataInSheet[2]["B"]);
$centrumnummer = trim($allDataInSheet[3]["B"]);
$schooljaar = trim($allDataInSheet[4]["B"]);



$sql = "INSERT INTO centrum (centrumnummer, naam) values ('$centrumnummer', '$centrumnaam')";
mysqli_query($link, $sql);

for($i=6;$i<=$arrayCount;$i++)
{
$lesplaatsnummer = trim($allDataInSheet[$i]["A"]);
$lesplaatsadres = trim($allDataInSheet[$i]["B"]);
$begindatum = substr(trim($allDataInSheet[$i]["C"]),6,4)."-".substr(trim($allDataInSheet[$i]["C"]),3,2)."-".substr(trim($allDataInSheet[$i]["C"]),0,2);
$einddatum = substr(trim($allDataInSheet[$i]["D"]),6,4)."-".substr(trim($allDataInSheet[$i]["D"]),3,2)."-".substr(trim($allDataInSheet[$i]["D"]),0,2);
$weekdag = trim($allDataInSheet[$i]["E"]);

$beginuur = trim($allDataInSheet[$i]["F"]);
$einduur = trim($allDataInSheet[$i]["G"]);
$cursuscode = trim($allDataInSheet[$i]["I"]);
$cursusnaam = trim($allDataInSheet[$i]["J"]);
$opleiding = trim($allDataInSheet[$i]["K"]);
$module = trim($allDataInSheet[$i]["L"]);
$titularis = trim($allDataInSheet[$i]["M"]);


$query = "SELECT cursuscode FROM klassen WHERE cursuscode = '$cursuscode'";
$sql = mysqli_query($link,$query);
$numberRows = mysqli_num_rows($sql); ?>
<tr>
  <td>
    <?php 
      echo $cursuscode;
      echo " - ";
      echo $schooljaar;
    ?>
  </td>
  <td>

<?php
$msg = "";
if ($numberRows==0) 
{
  $sql = "INSERT INTO klassen (cursuscode, cursusnaam, opleiding, schooljaar, titularis, begindatum, einddatum, centrumnummer,lesplaatsnummer) 
          VALUES ('$cursuscode','$cursusnaam','$opleiding','$schooljaar','$titularis','$begindatum','$einddatum','$centrumnummer','$lesplaatsnummer')";
  if(mysqli_query($link, $sql))
  {
    $msg .= "Klas succesvol toegevoegd.";
  } 
  else
  {
    $msg .=  "ERROR 001: " . mysqli_error($link);
  }  
}
else
{
  $sql = "UPDATE klassen set cursusnaam = '$cursusnaam', opleiding = '$opleiding', schooljaar = '$schooljaar',
                             titularis = '$titularis', begindatum = '$begindatum', einddatum = '$einddatum',
                             centrumnummer = '$centrumnummer', lesplaatsnummer = '$lesplaatsnummer'
          WHERE cursuscode = '$cursuscode'";
  if(mysqli_query($link, $sql))
  {
    $msg .= "Klas succesvol aangepast.";
  } 
  else
  {
    $msg .= "ERROR 002: " . mysqli_error($link);
  }
}

$sql = "INSERT INTO lesplaats (lesplaatsnummer, lesplaatsadres) values ('$lesplaatsnummer', '$lesplaatsadres')";
mysqli_query($link, $sql);
switch ($weekdag) 
{
  case "Maandag":
    $dag = 1;
    break;
  case "Dinsdag":
    $dag = 2;
    break;
  case "Woensdag":
    $dag = 3;
    break;
  case "Donderdag":
    $dag = 4;
    break;
  case "Vrijdag":
    $dag = 5;
    break;
  case "Zaterdag":
    $dag = 6;
    break;
  case "Zondag":
    $dag = 7;
    break;
  default:
    $dag = 0;
}
if ($dag != 0) 
{
$query = "SELECT dag from lestijden where cursuscode = '$cursuscode' and dag = $dag";
$sql = mysqli_query($link,$query);
$numberRows = mysqli_num_rows($sql);
if ($numberRows == 0)
{
  $sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
          VALUES ('$cursuscode', $dag, '$beginuur', '$einduur')";
  if(mysqli_query($link, $sql))
  {
    $msg .= "; Dag $dag succesvol toegevoegd.";
  } 
  else
  {
    $msg .=  "ERROR 003: " . mysqli_error($link);
  }
}
}

$query = "SELECT module FROM module WHERE cursuscode = '$cursuscode' and module = '$module'";
$sql = mysqli_query($link,$query);
$numberRows = mysqli_num_rows($sql);
if ($numberRows == 0)
{
  $sql = mysqli_query($link,"SELECT module from module where cursuscode = '$cursuscode'");
  $numberRows = mysqli_num_rows($sql);
  if ($numberRows < 2)
  {
    $numberRows += 1;
    $sql = "INSERT INTO module (module, cursuscode, modulenummer) values ('$module', '$cursuscode', $numberRows)";
    if (mysqli_query($link, $sql))
    {
      $msg .= "; Module toegevoegd.";
    } 
    else
    {
      $msg .=  "ERROR 004: $module, $cursuscode, $numberRows " . mysqli_error($link);
    }
  }
  else
  {
    $msg .= "; $module doesn't exist, but there are only 2 modules allowed.";
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