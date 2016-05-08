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
$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Gebruikers lijst</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

<?php
//create the query
$result = mysqli_query($link, "select username, type, lastname, firstname from members");

?>


  <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-primary">
            <div class="panel-heading">
              Gebruikers
            </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
      <th>username</th>
      <th>type</th>
      <th>lastname</th>
      <th>firstname</th>
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
        echo $row['username'];
        ?>
      </td>
      <td>
        <?php 
        echo $row['type'];
        ?>
      </td>
      <td>
        <?php 
        echo $row['lastname'];
        ?>
      </td>      
      <td>
        <?php 
        echo $row['firstname'];
        ?>
      </td>
      <td align="right"> 
        <a href="usermodify.php?id=<?php echo $row['username'];?>" title="wijzigen"><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button></a>
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
      </div>
      










    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>
