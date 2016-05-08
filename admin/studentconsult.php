<?php include 'include/secureHeader.php'; ?>

<?php


//create a database connection
include 'include/constants.inc.php';


//select database
$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

?>




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

        <?php include 'include/navigationstudent.php'; 

//create the query
$value = $_GET["id"];
$result = mysqli_query($link, "select * from student where StudentNumber = '$value'");

if (!$result){
  echo 'select student error' . mysqli_error();
  exit();
}

$row = mysqli_fetch_array($result)

?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Details van een cursist</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>

 <div class="row">
    <div class="col-lg-6">
      <div class="panel panel-primary">
      <div class="panel-heading">
          <?php 
        echo $row['FirstName'];
        echo " ";
        echo $row['LastName'];
        ?> 
                            
        </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          
          <table class="table table-bordered table-hover" id="dataStudent">
    <tbody>
    <tr>
      <td>
        <b>Id:</b>
      </td>
      <td>
        <?php 
        echo $row['StudentNumber'];
        ?> 
      </td>
    </tr>
    
    <tr>
      <td>
        <b>Geboortedatum:</b>
      </td>
      <td>
        <?php 
        echo $row['DateOfBirth'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <b>Nationaliteit:</b>
      </td>
      <td>
        <?php 
        echo $row['Nationality'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <b>Straat:</b>
      </td>
      <td>
        <?php 
        echo $row['Street'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <b>Postcode:</b>
      </td>
      <td>
        <?php 
        echo $row['PostCode'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <b>Gemeente:</b>
      </td>
      <td>
        <?php 
        echo $row['Commune'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <b>Telefoon nummer:</b>
      </td>
      <td>
        <?php 
        echo $row['TelephoneNumber'];
        ?>
      </td>
    </tr>

    <tr>
      <td>
        <b>Email:</b>
      </td>
      <td>
        <?php 
        echo $row['Email'];
        ?>
      </td>
    </tr>
    <tr>
      <td>
        <b>Gsm nummer:</b>
      </td>
      <td>
        <?php 
        echo $row['MobileNumber'];
        ?>
      </td>
    </tr>


</tbody>
          </table>
          
        </div>
      </div>
    </div>
    </div>

  <div class="col-lg-6">
  <?php
    $resultcursuslijst = mysqli_query($link, "select cursuscode, StudentNumber from studentklas where StudentNumber = '$value'");
    
?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        gevolgde cursusen
      </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-bordered table-hover" id="dataStudent">
            <thead>
              <tr>
                <th>Cursus code:</th>
                <th>Cursus naam:</th>
                <th>Schooljaar:</th>
              </tr>
            </thead>
            <tbody>
            <?php
              while ($rowcursuslijst = mysqli_fetch_array($resultcursuslijst)){
                $cursuscode = $rowcursuslijst['cursuscode'];
                $klaslijst = mysqli_query($link, "select cursuscode, cursusnaam, schooljaar from klassen where cursuscode = '$cursuscode'");
                $rowklaslijst = mysqli_fetch_array($klaslijst);
            ?>
              <tr>
                <td>
                  <a href="klasconsult.php?id=<?php echo $cursuscode;?>">
                  <?php 
                    echo $cursuscode;
                  ?> 
                  </a>
                </td>
                <td>
                  <?php 
                    echo $rowklaslijst['cursusnaam'];
                  ?> 
                </td>
                <td>
                  <?php 
                    echo $rowklaslijst['schooljaar'];
                  ?> 
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

