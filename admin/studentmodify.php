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

        <?php include 'include/navigationstudent.php'; ?>

          <?php

//create the query
$value = $_GET["id"];
$result = mysql_query("select * from student where StudentNumber = '$value'");

if (!$result){
  echo 'select student error' . mysql_error();
  exit();
}

$row = mysql_fetch_array($result)

?>



        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Cursist aanpassen</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                  <div class="row">
                  <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <label>
                          <?php echo $row['FirstName'];?>
                          <?php echo " ";?>
                          <?php echo $row['LastName'];?>
                          </label>
                        </div>
                    <div class="panel-body">

                      <form action="studentmodifytable.php?id=<?php echo $row['StudentNumber'];?>" method="post" role="form">

                      <fieldset disabled>
                      <div class="form-group">
                        <label for="Stamnummer">Stamnummer: </label>
                        <input class="form-control" type="text" name="stamnummer" id="Stamnummer" value="<?php echo $row['StudentNumber'];?>" autofocus>
                      </div>
                      </fieldset>
                      <div class="form-group">
                        <label for="firstName">Voornaam: </label>
                        <input class="form-control" type="text" name="firstname" id="firstName" value="<?php echo $row['FirstName'];?>" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="lastName">Achternaam: </label>
                        <input class="form-control" type="text" name="lastname" id="lastName" value="<?php echo $row['LastName']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="dateOfBirth">Geboortedatum: </label>
                        <input class="form-control" type="date" name="dateofbirth" id="dateOfBirth" value="<?php echo $row['DateOfBirth']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Nationality">Nationaliteit: </label>
                        <input class="form-control" type="text" name="nationality" id="Nationality" value="<?php echo $row['Nationality']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Street">Straat: </label>
                        <input class="form-control" type="text" name="street" id="Street" value="<?php echo $row['Street']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Postcode">Postcode: </label>
                        <input class="form-control" type="text" name="postcode" id="Postcode" value="<?php echo $row['PostCode']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="Commune">Gemeente: </label>
                        <input class="form-control" type="text" name="commune" id="Commune" value="<?php echo $row['Commune'];?>">
                      </div>
                      <div class="form-group">
                        <label for="phone">Telefoon nummer: </label>
                        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $row['TelephoneNumber'];?>">
                      </div>
                      <div class="form-group">
                        <label for="eMail">E-mail: </label>
                        <input class="form-control" type="text" name="email" id="eMail" value="<?php echo $row['Email'];?>">
                      </div>
                      <div class="form-group">
                        <label for="MobileNumber">Gsm: </label>
                        <input class="form-control" type="text" name="mobilenumber" id="MobileNumber" value="<?php echo $row['MobileNumber'];?>">
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
  </div>
  </div>
  
  
    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>

</body>

</html>
