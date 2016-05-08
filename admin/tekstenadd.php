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
              <h2 class="page-header">Teksten aanmaken</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6">

                      <form action="tekstenaddtable.php" method="post" role="form">


                      <div class="form-group">
                        <label for "tekst">Tekst: </label>
                        <input class="form-control" placeholder="Vul in" type="text" name="tekst" id="tekst" autofocus> 
                      </div>

                        <div class="form-group">
                          <label for "Tekstsoort">Tekstsoort: </label>
                          <select name="tekstsoort" id="Tekstsoort" class="form-control" >
                            <option selected disabled>Kies een optie</option>
                            <option>artistiek</option>
                            <option>descriptief</option>
                            <option>informatief</option>
                            <option>informatief/narratief</option>
                            <option>informatief/prescriptief</option>
                            <option>narratief</option>
                            <option>narratief/informatief</option>
                            <option>NVT</option>
                            <option>perspectief</option>
                            <option>persuasief</option>
                            <option>prescriptief</option>

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