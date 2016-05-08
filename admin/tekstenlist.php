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
      <h2 class="page-header">Teksten lijst</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

<?php
//create the query
$result = mysql_query("select tekstid, tekst, tekstsoort from teksten");

if (!$result){
  echo 'select attitude error' . mysql_error();
  exit();
}
?>


  <div class="row">
    <div class="col-lg-12">
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
      <th>Tekst Id</th>
      <th>Tekst</th>
      <th>Tekstsoort</th>
      <th></th>
    </tr>  
    </thead>  
    <tbody>
<?php


while ($row = mysql_fetch_array($result))
{
?>
    <tr class="odd">
      <td>
        <?php 
        echo $row['tekstid'];
        ?>
      </td>
      <td>
        <?php 
        echo $row['tekst'];
        ?>
      </td>
      <td>
        <?php 
        echo $row['tekstsoort'];
        ?>
      </td>
      <td align="right"> 
        <a href="tekstenmodify.php?id=<?php echo $row['tekstid'];?>"><i class="fa fa-edit fa-fw"></i></a>
      </td>
    </tr>

<?php
if ($row = mysql_fetch_array($result))
{
?>

    <tr class="even">
      <td>
        <?php 
        echo $row['tekstid'];
        ?>
      </td>
      <td>
        <?php 
        echo $row['tekst'];
        ?>
      </td>
      <td>
        <?php 
        echo $row['tekstsoort'];
        ?>
      </td>
      <td align="right"> 
        <a href="tekstenmodify.php?id=<?php echo $row['tekstid'];?>"><i class="fa fa-edit fa-fw"></i></a>
      </td>
    </tr>

<?php 
} 

?>
<?php 
} 

?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>









    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>
