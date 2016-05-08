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
    include 'include/navigationstudent.php'; 

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
      <h2 class="page-header">Cursisten lijst</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

<?php

//create the query
$result = mysql_query("select * from student");

if (!$result){
  echo 'select error' . mysql_error();
  exit();
}
?>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
            <div class="panel-heading">
              Cursisten
            </div>
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
while ($row = mysql_fetch_array($result))
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

        <a href="studentmodify.php?id=<?php echo $row['StudentNumber'];?>" title="wijzigen"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button></a>
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

  </div>


    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>
