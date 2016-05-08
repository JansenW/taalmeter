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
  <?php include 'include/navigationklas.php'; ?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Klas aanmaken</h2>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <form action="klasaddtable.php" method="post" role="form">
        <div class="col-lg-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Klasgegevens
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for "Leraar">Cursuscode: </label>
                    <input class="form-control" placeholder="Cursuscode" type="text" name="cursuscode" id="Cursuscode" autofocus> 
                  </div>

                  <div class="form-group">
                    <label for "Schooljaar">Schooljaar: </label>
                    <input class="form-control" placeholder="2015-2016" type="text" name="schooljaar" id="Schooljaar"> 
                  </div>

                  <div class="form-group">
                    <label for "Schooljaar">Cursusnaam: </label>
                    <input class="form-control" type="text" name="cursusnaam" id="Cursusnaam" placeholder="Cursusnaam"> 
                  </div>

                  <div class="form-group">
                    <label for "Opleiding">Opleiding: </label>
                    <input class="form-control" placeholder="Opleiding" type="text" name="opleiding" id="Opleiding"> 
                  </div>

                  <div class="form-group">
                    <label for "Titularis">Titularis: </label>
                    <input class="form-control" placeholder="Titularis" type="text" name="titularis" id="Titularis"> 
                  </div>
                </div>
                <div class="col-lg-6 col-lg-offset-0">

                  <div class="form-group">
                    <label for "Begindatum">Begindatum: </label>
                    <input class="form-control" placeholder="Begindatum" type="date" name="begindatum" id="Begindatum"> 
                  </div>

                  <div class="form-group">
                    <label for "Einddatum">Einddatum: </label>
                    <input class="form-control" placeholder="Einddatum" type="date" name="einddatum" id="Einddatum"> 
                  </div>

                  <div class="form-group">
                    <label for "Centrumnummer">Centrum nummer: </label>
                    <input class="form-control" placeholder="Centrumnummer" type="text" name="centrumnummer" id="Centrumnummer"> 
                  </div>

                  <div class="form-group">
                    <label for "Lesplaatsnummer">Lesplaats nummer: </label>
                    <input class="form-control" placeholder="Lesplaatsnummer" type="text" name="lesplaatsnummer" id="Lesplaatsnummer"> 
                  </div>

                  <div class="form-group">
                    <label for "Module1">Module1 : </label>
                    <input class="form-control" placeholder="Module1" type="text" name="module1" id="Module1"> 
                  </div>
                  
                  <div class="form-group">
                    <label for "Module2">Module2 : </label>
                    <input class="form-control" placeholder="Module2" type="text" name="module2" id="Module2"> 
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              lesrooster
            </div>
            <div class="panel-body">
              <div class="row">
                <?php
                  $i = 1;

                  while ($i < 8) 
                  {
                    $label = "";
                    $start = "";
                    $end = "";

                    switch ($i) {
                      case 1:
                        $label = "Maandag";
                        $start = "beginma";
                        $end = "eindma";
                        break;
                      case 2:
                        $label = "Dinsdag";
                        $start = "begindi";
                        $end = "einddi";
                        break;
                      case 3:
                        $label = "Woensdag";
                        $start = "beginwo";
                        $end = "eindwo";
                        break;
                      case 4:
                        $label = "Donderdag";
                        $start = "begindo";
                        $end = "einddo";
                        break;
                      case 5:
                        $label = "Vrijdag";
                        $start = "beginvr";
                        $end = "eindvr";
                        break;
                      case 6:
                        $label = "Zaterdag";
                        $start = "beginza";
                        $end = "eindza";
                        break;
                      case 7:
                        $label = "Zondag";
                        $start = "beginzo";
                        $end = "eindzo";
                        break;
                      default:
                        $label = "error";
                        $start = "error";
                        $end = "error";

                    } 
                ?>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo $label ?></label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="input-group input-daterange">
                              <span class="input-group-addon">van</span>
                              <input type="text" class="form-control timepicker" name="<?php echo $start ?>" id="<?php echo $start ?>">
                              <span class="input-group-addon">tot</span>
                              <input type="text" class="form-control timepicker" name="<?php echo $end ?>" id="<?php echo $end ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <span> <br><br></span>
                <?php
                    $i++;
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <table style="margin-left:auto;margin-right:auto">
            <tr>
              <td>
                <button type="submit" class="btn btn-default">Toevoegen</button>
                <button type="reset" class="btn btn-default">Reset</button>
              </td>
            </tr>
          </table>
        </div>
    </form>
  </div>
  </div>
  
  </div>
</body>
  
  
    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>

</body>

</html>

