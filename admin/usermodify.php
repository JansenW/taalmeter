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

$result = mysqli_query($link, "select username, type, lastname, firstname from members where username = '$value'");

$row = mysqli_fetch_array($result)

?>



        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Gebruiker aanpassen</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <label>
                          Gebruikersinfo
                          </label>
                        </div>
                    <div class="panel-body">

                      <form action="userclassaction.php?action=M&cursuscode= &id=<?php echo $value;?>" method="post" role="form">

                      <div class="form-group">
                        <label for="username">Gebruikersnaam: </label>
                        <input class="form-control" type="text" name="username" id="username" value="<?php echo $row['username'];?>" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="lastname">Achternaam: </label>
                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $row['lastname'];?>" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="firstName">Voornaam: </label>
                        <input class="form-control" type="text" name="firstname" id="firstName" value="<?php echo $row['firstname'];?>" >
                      </div>
                      <div class="form-group">
                        <label for "type">Type: </label>
                          <?php $selected = $row['type'];?>
                          <select name="type" id="type" class="form-control" value="<?php echo $row['type'];?>">
                            <option <?php if($selected == '1'){echo("selected");}?>>admin</option>
                            <option <?php if($selected == '2'){echo("selected");}?>>leerkracht</option>
                          </select>
                      </div>                                             
                        <button type="submit" class="btn btn-default">Aanpassen</button>
                        <button type="reset" class="btn btn-default">Reset</button>

                    </form>
                    <br>
                <table>
                  <tr>
                    <td>
                      <a href="userclassaction.php?action=R&cursuscode= &id=<?php echo $value;?>"><button type="button" class="btn btn-primary">Reset password</button></a>
                    </td>
                    <?php
                      if ((isset($_SESSION['result']) && $_SESSION['result'] == 'ok'))
                      {
                        $_SESSION['result'] = NULL;
                    ?>
                    <td>
                      Pasword reset
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </table>
</div>
</div>
</div>
<?php
if ($row['type'] == 2)
{

$result = mysqli_query($link, "select cursuscode from teacherclasses where username = '$value'");

?>
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <label>
                          Cursussen
                          </label>
                        </div>
                    <div class="panel-body">

                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Cursus naam</th>
                      <th></th>   
                    </tr>  
                  </thead>  
                  <tbody>
                    <?php
                    while ($class = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                      <td><a href="klasconsult.php?id=<?php echo $class['cursuscode'];?>"><?php 
                        echo $class['cursuscode'];?></a>
                      </td>
                      <td align="right">
                        <a href="userclassaction.php?action=D&cursuscode=<?php echo $class['cursuscode'];?>&id=<?php echo $value;?>" title="verwijderen"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                  </a>
                        
                      </td>
                    </tr>
                    <?php
                    
                  }
                    ?>

                  </tbody>
                </table>
                <table>
                  <tr>
                    <td>
                      <a href="userclassadd.php?id=<?php echo $value;?>"><button type="button" class="btn btn-primary">Cursussen toevoegen</button></a>
                    </td>
                  </tr>
                </table>
                <?php
              }
                ?>
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
