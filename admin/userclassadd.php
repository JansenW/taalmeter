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

        <?php include 'include/navigationadministration.php'; ?>

<?php


//create a database connection
include 'include/constants.inc.php';


$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$username = $_GET["id"];
$users = mysqli_query($link,"select * from members where username = '$username'");
$user = mysqli_fetch_array($users);

?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Cursussen beschikbaar maken voor de leerkracht: <?php echo $user['FirstName'].' '.$user['LastName'];?> </h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

<?php

//create the query
$result = mysqli_query($link, "select cursuscode, cursusnaam, schooljaar from klassen where cursuscode not in (select cursuscode from teacherclasses where username = '$username') order by schooljaar, cursuscode");

?>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Cursus code</th>
                <th>Cursus naam</th>
                <th>Schooljaar</th>
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
                  <u>
                  <a href="klasconsult.php?id=<?php echo $row['cursuscode'];?>">
                  <?php 
                  echo $row['cursuscode'];
                  ?>
                  </a>
                  </u>
                </td>
                <td>
                  <?php 
                  echo $row['cursusnaam'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $row['schooljaar'];
                  ?>
                </td>
                <td align="right"> 
                  <a href="userclassaddtable.php?id=<?php echo $username?>&cursuscode=<?php echo $row['cursuscode'];?>" title="toevoegen"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-plus"></i></button>
                  </a>
                </td>
              </tr>


<?php 
} 

?>
            </tbody>
          </table>
          <a href="usermodify.php?id=<?php echo $username;?>"><button type="button" class="btn btn-primary">terug naar de gebruiker</button></a>
        </div>
      </div>
    </div>
  </div>









    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>
