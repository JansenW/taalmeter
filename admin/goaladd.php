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



        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Leerplan doelstelling aanmaken</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">

                      <form action="goaladdtable.php" method="post" role="form">



                        <div class="form-group">
                          <label for="Learninggoal">Leerplandoelstelling: </label>
                          <input class="form-control" name="learninggoal" id = "Learninggoal">

                          <label for "Skill">Vaardigheid: </label>
                          <select name="skill" id="Skill" class="form-control" >
                            <option selected disables>Kies een optie</option>
                            <option>SPREKEN</option>
                            <option>SCHRIJVEN</option>
                            <option>LEZEN</option>
                            <option>LUISTEREN</option>
                          </select>

<?php
//create a database connection
include 'include/constants.inc.php';

//select database
$link = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

$sql = "select level from level";

$result = mysqli_query($link, $sql);

?>
                        


                          <label for="Level">Niveau: </label>
                          <select class="form-control" name="level" id = "Level">
                            <option selected disables>Kies een optie</option>
                            <?php while ($row = mysqli_fetch_array($result)){ ?>
                            <option><?php echo $row['level'];?> </option>
                            <?php } ?>
                          </select>

                        </div>

                        <button type="submit" class="btn btn-default">Toevoegen</button>
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