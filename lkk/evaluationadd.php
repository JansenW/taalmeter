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
    include 'include/navigation.php';

//create a database connection
    include 'include/constants.inc.php';

//select database
    $link = open_database_connection();
  
//create the query
    $result = mysqli_query($link, "select cursuscode, cursusnaam, schooljaar
                         from klassen where cursuscode in (select cursuscode 
                                            from teacherclasses 
                                            where username = '$username')");

  //$moduleselect = mysqli_query($link, "select module from module where cursuscode = '$value' order by modulenummer");

  ?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Nieuwe evaluatie maken</h2>
        </div>
      </div>
      <form action="evaluationadd2.php" method="post" role="form">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Stap 1/2 - Selecteer een klas
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-3">
            <select name="cursus" id="cursus" class="form-control" onchange="showCursus(this.value)">
              <option value="" selected>Kies een cursus</option>                            
              <?php                        
              while ($row = mysqli_fetch_array($result))
              {
              ?>
                <option value="<?php echo $row['cursuscode'];?>"><?php echo $row['cursuscode'];?></option>
              <?php
              }
              ?>
            </select>
            </div>
            </div>
          </div>
        </div>

        <div>             
          <button type="submit" class="btn btn-default">Volgende</button>
        </div>
      </form>
    </div>
  </div>

    <!-- jQuery -->
<?php include 'include/cssend.php'; ?>

</body>

</html>

