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

    <div id="wrapper">

        <?php include 'include/navigationstudent.php'; ?>

<?php


//create a database connection
include 'include/constants.inc.php';


$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  $value = $_GET["id"];

$klas = mysqli_query($link, "select * from klassen where cursuscode = '$value'");
$klasnaam = mysqli_fetch_array($klas);


?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Cursisten toevoegen aan <?php echo $klasnaam['cursuscode'];?> </h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

<?php

//create the query
$result = mysqli_query($link, "select * from student where StudentNumber not in (select StudentNumber from studentklas where cursuscode = '$value')");

?>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Stamnummer</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>E-mail</th>
                <th>Gsm</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                                   
<?php
while ($row = mysqli_fetch_array($result))
{
?>
            
              <tr>
                <td>
                  <?php 
                  echo $row['StudentNumber'];
                  ?>
                </td>
                <td>
                  <u>
                  <a href="studentconsult.php?id=<?php echo $row['StudentNumber'];?>">
                  <?php 
                  echo $row['FirstName'];
                  ?>
                  </a>
                  </u>
                </td>
                <td>
                  <?php 
                  echo $row['LastName'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $row['Email'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $row['MobileNumber'];
                  ?>
                </td>
                <td align="right"> 
                  <a href="studentklassaddtable.php?id=<?php echo $value?>&StudentNumber=<?php echo $row['StudentNumber'];?>" title="toevoegen"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-plus"></i></button>
                  </a>
                </td>
              </tr>


<?php 
} 

?>
            </tbody>
          </table>
          <a href="klasconsult.php?id=<?php echo $value;?>"><button type="button" class="btn btn-primary">terug naar de klas</button></a>
        </div>
      </div>
    </div>
  </div>









    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>
