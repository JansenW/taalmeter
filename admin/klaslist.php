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
    <?php 

         include 'include/navigationklas.php';

//create a database connection
include 'include/constants.inc.php';


//select database
if(!@mysql_connect($DB_HOST,$DB_USER,$DB_PASS)) {
  echo '<h1>MySQL Server is not connected</h1>';
  exit;
}

if(!@mysql_select_db($DB_NAME)){
  echo '<h1>Database can not be found</h>';
  exit;
}

?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Klas lijst</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

<?php
//create the query
$result = mysql_query("select cursuscode, cursusnaam, opleiding, schooljaar, titularis from klassen order by cursuscode");

if (!$result){
  echo 'select attitude error' . mysql_error();
  exit();
}
?>


  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
            <div class="panel-heading">
              Klassen
            </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
      <th>Cursuscode</th>
      <th>Cursusnaam</th>
      <th>Opleiding</th>
      <th>Schooljaar</th>
      <th>Titularis</th>
      <th></th>
    </tr>  
    </thead>  
    <tbody>
<?php


while ($row = mysql_fetch_array($result))
{
?>
    <tr>
      <td><?php 
        echo $row['cursuscode'];
        ?>
      </td>
      <td><?php 
        echo $row['cursusnaam'];
        ?>
      </td>
      <td><?php 
        echo $row['opleiding'];
        ?>
      </td>
      <td><?php 
        echo $row['schooljaar'];
        ?>
      </td><td><?php 
        echo $row['titularis'];
        ?>
      </td>
      
      <td align="right"> 
        <a href="klasmodify.php?id=<?php echo $row['cursuscode'];?>" title="wijzigen"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button></a>
        <a href="klasconsult.php?id=<?php echo $row['cursuscode'];?>" title="consulteren"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-search"></i></button></a>
      </td>
    </tr>



<?php 
} 

?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>


</div>


    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>

