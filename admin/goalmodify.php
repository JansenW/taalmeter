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

        <?php include 'include/navigationadministration.php'; ?>

          <?php

//create the query
$value = $_GET["id"];

$result = mysqli_query($link, "select learninggoalid, learninggoal, skill, level 
                       from goal t1, level t2 
                       where learninggoalid = '$value' and t1.levelid = t2.levelid");

$row = mysqli_fetch_array($result);

?>
        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Leerplan doelstelling aanpassen</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">

                      <form action="goalmodifytable.php?id=<?php echo $value?>" method="post" role="form">



                      <div class="form-group">
                          <label for="Learninggoal">Leerplandoelstelling: </label>
                          <input class="form-control" name="learninggoal" id = "Learninggoal" value="<?php echo $row['learninggoal'];?>">

                          <label for "Skill">Vaardigheid: </label>
                          <select name="skill" id="Skill" class="form-control">
                            <?php $selected = $row['skill'];?>
                            <option <?php if($selected == 'SPREKEN'){echo("selected");}?>>SPREKEN</option>
                            <option <?php if($selected == 'SCHRIJVEN'){echo("selected");}?>>SCHRIJVEN</option>
                            <option <?php if($selected == 'LEZEN'){echo("selected");}?>>LEZEN</option>
                            <option <?php if($selected == 'LUISTEREN'){echo("selected");}?>>LUISTEREN</option>
                          </select>

<?php

$sql2 = "select level from level";

$result2 = mysqli_query($link, $sql2);

?>
                          <label for="Level">Niveau: </label>
                          <select class="form-control" name="level" id="Level">
                            <?php $selected = $row['level'];?>
                            <?php while ($row2 = mysqli_fetch_array($result2)){ ?>
                            <option <?php if($selected == $row2['level']){echo("selected");}?>><?php echo $row2['level'];?> </option>
                            <?php } ?>
                          </select>

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



