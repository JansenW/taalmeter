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

<?php include 'include/cssstart.php'; ?>

</head>

<body>

    <div id="wrapper">
    <?php 

         include 'include/navigationevaluation.php';

//create a database connection
include 'include/constants.inc.php';


//select database
$link = open_database_connection();

  $result = mysqli_query($link, "select cursuscode
                         from klassen where cursuscode in (select cursuscode 
                                            from teacherclasses 
                                            where username = '$username') order by cursuscode");

?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Evaluatie lijst</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>
<div class="row">
<div class="col-lg-3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Selecteer een klas
              </div>
              <div class="panel-body">
                
                  <select name="cursus" id="cursus" class="form-control" onchange="javascript:location.href = this.value">
                  <option value="" selected>Kies een cursus</option>                            
                  <?php                        
                    while ($row = mysqli_fetch_array($result))
                    {
                  ?>
                      <option value="evaluationclasslist.php?id=<?php echo $row['cursuscode'];?>"><?php echo $row['cursuscode'];?></option>
                  <?php
                    }
                  ?>
                  </select>
                
              </div>
            </div>
          </div>
          </div>
          <div class="row">
</div>
</div>
</div>

    <!-- jQuery -->
<?php include 'include/cssend.php'; ?>
</body>

</html>

