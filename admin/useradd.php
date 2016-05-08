


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
              <h2 class="page-header">Gebruiker aanmaken</h2>
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
                          Gebruikers gegevens
                        </div>
                        <div class="panel-body">

                      <form action="useraddtable.php" method="post" role="form">

                      <div class="form-group">
                        <label for="username">Gebruikersnaam (email): </label>
                        <input class="form-control" placeholder="user@mail.com" type="email" name="username" id="username" autofocus>
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
                        <label for "type">Type: </label>
                          <select name="type" id="type" class="form-control">
                            <option selected disabled>Kies een optie</option>
                            <option>admin</option>
                            <option>leerkracht</option>
                          </select>
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






