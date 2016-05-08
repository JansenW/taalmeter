


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
    <?php include 'include/cssstart.php'; ?>>
</head>

<body>

    <div id="wrapper">

        <?php include 'include/navigationstudent.php'; ?>



        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Cursist aanmaken</h2>
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
                          Cursist gegevens
                        </div>
                        <div class="panel-body">

                      <form action="studentaddtable.php" method="post" role="form">

                      <div class="form-group">
                        <label for="stamNummer">Stamnummer: </label>
                        <input class="form-control" placeholder="stamnummer" type="text" name="stamnummer" id="stamNummer" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="firstName">Voornaam: </label>
                        <input class="form-control" placeholder="voornaam" type="text" name="firstname" id="firstName" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="lastName">Achternaam: </label>
                        <input class="form-control" placeholder="achternaam" type="text" name="lastname" id="lastName">
                      </div>
                      <div class="form-group">
                        <label for="dateOfBirth">Geboortedatum: </label>
                        <input class="form-control" type="date" name="dateofbirth" id="dateOfBirth">
                      </div>
                      <div class="form-group">
                        <label for="Nationality">Nationaliteit: </label>
                        <input class="form-control" placeholder="nationaliteit" type="text" name="nationality" id="Nationality">
                      </div>
                      <div class="form-group">
                        <label for="Street">Straat: </label>
                        <input class="form-control" placeholder="straat + huisnummer" type="text" name="street" id="Street">
                      </div>
                      <div class="form-group">
                        <label for="Postcode">Postcode: </label>
                        <input class="form-control" placeholder="postcode" type="text" name="postcode" id="Postcode">
                      </div>
                      <div class="form-group">
                        <label for="Commune">Gemeente: </label>
                        <input class="form-control" placeholder="gemeente" type="text" name="commune" id="Commune">
                      </div>
                      <div class="form-group">
                        <label for="phone">Telefoon nummer: </label>
                        <input class="form-control" placeholder="telefoon nummer" type="text" name="phone" id="phone">
                      </div>
                      <div class="form-group">
                        <label for="eMail">E-mail: </label>
                        <input class="form-control" placeholder="e-mail" type="text" name="email" id="eMail">
                      </div>
                      <div class="form-group">
                        <label for="MobileNumber">Gsm: </label>
                        <input class="form-control" placeholder="gsm" type="text" name="mobilenumber" id="MobileNumber">
                      </div>

                      <div class="col-lg-3">
                      </div>
                      <div class="col-lg-6">             
                        <button type="submit" class="btn btn-default">Toevoegen</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>

                      
                      </div>

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






