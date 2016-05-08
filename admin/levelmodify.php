<?php include 'include/secureHeader.php'; ?>
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

//create the query
$value = $_GET["id"];

$result = mysql_query("select levelid, level, departmentcode, weighttalking, weightwriting, weightreading, weightlistening from level where levelid = $value");


if (!$result){
  echo 'select error' . mysql_error();
  exit();
}

$row = mysql_fetch_array($result)

?>
        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Niveau aanpassen</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">

                      <form action="levelmodifytable.php?id=<?php echo $row['levelid'];?>" method="post" role="form">


                      <div class="form-group">

                        <fieldset disabled>
                          <label for="id">Niveau Id: </label>
                          <input class="form-control" type="text" name="id" id="id" value="<?php echo $row['levelid'];?>">
                        </fieldset>

                        <label for="level">Niveau: </label>
                        <input class="form-control" type="text" name="level" id="level" value="<?php echo $row['level'];?>" autofocus>

                        <label for="departmentcode">Departementcode: </label>
                        <input class="form-control" type="text" name="departmentcode" id="departmentcode" value="<?php echo $row['departmentcode'];?>">

                        <label for="weighttalking">Gewicht spreken: </label>
                        <input class="form-control" type="text" name="weighttalking" id="weighttalking" value="<?php echo $row['weighttalking'];?>">

                        <label for="weightwriting">Gewicht schrijven: </label>
                        <input class="form-control" type="text" name="weightwriting" id="weightwriting" value="<?php echo $row['weightwriting'];?>">

                        <label for="weightreading">Gewicht lezen: </label>
                        <input class="form-control" type="text" name="weightreading" id="weightreading" value="<?php echo $row['weightreading'];?>">

                        <label for="weightlistening">Gewicht luisteren: </label>
                        <input class="form-control" type="text" name="weightlistening" id="weightlistening" value="<?php echo $row['weightlistening'];?>">

                      </div>

                                             
                        <button type="submit" class="btn btn-default">Aanpassen</button>
                        <button type="reset" class="btn btn-default">Reset</button>

</form>
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



