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

        <?php include 'include/navigationklas.php';
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


//create the query
$value = $_GET["id"];

$result = mysql_query("select * 
                      from klassen where cursuscode = '$value'");

if (!$result){
  echo 'select error' . mysql_error();
  exit();
}

$row = mysql_fetch_array($result);

$times = mysql_query("select dag, beginuur, einduur from lestijden where cursuscode = '$value' order by dag");

if (!$times){
  echo 'select error' . mysql_error();
  exit();
}

$module = mysql_query("select * from module where cursuscode = '$value'");



?>


        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="page-header">Klas aanpassen</h2>
            </div>
            <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <form action="klasmodifytable.php?id=<?php echo $value;?>" method="post" role="form">  
            <div class="col-lg-6">
            
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Klasgegevens
                </div>
                <div class="panel-body">
                  <div class="row">
                <div class="col-lg-6">
                                   
                      <fieldset disabled>
                      <div class="form-group">
                        <label for "cursuscode">cursuscode: </label>
                        <input class="form-control" type="text" name="cursuscode" id="cursuscode" value="<?php echo $row['cursuscode'];?>"> 
                      </div>

                      <div class="form-group">
                        <label for "schooljaar">schooljaar: </label>
                        <input class="form-control" type="text" name="schooljaar" id="schooljaar" value="<?php echo $row['schooljaar'];?>"> 
                      </div>

                      </fieldset>

                      <div class="form-group">
                        <label for "Leraar">cursusnaam: </label>
                        <input class="form-control" type="text" name="cursusnaam" id="cursusnaam" value="<?php echo $row['cursusnaam'];?>" autofocus> 
                      </div>                      

                      <div class="form-group">
                        <label for "Opleiding">Opleiding: </label>
                        <input class="form-control" type="text" name="opleiding" id="Opleiding" value="<?php echo $row['opleiding'];?>"> 
                      </div>

                      <div class="form-group">
                        <label for "titularis">titularis: </label>
                        <input class="form-control" type="text" name="titularis" id="titularis" value="<?php echo $row['titularis'];?>"> 
                      </div>
                </div>
                <div class="col-lg-6 col-lg-offset-0">

                      <div class="form-group">
                        <label for "begindatum">begindatum: </label>
                        <input class="form-control" type="date" name="begindatum" id="begindatum" value="<?php echo $row['begindatum'];?>"> 
                      </div>

                      <div class="form-group">
                        <label for "einddatum">einddatum: </label>
                        <input class="form-control" type="date" name="einddatum" id="einddatum" value="<?php echo $row['einddatum'];?>"> 
                      </div>

                      <div class="form-group">
                        <label for "centrumnummer">centrumnummer: </label>
                        <input class="form-control" type="text" name="centrumnummer" id="centrumnummer" value="<?php echo $row['centrumnummer'];?>"> 
                      </div>

                      <div class="form-group">
                        <label for "lesplaatsnummer">lesplaatsnummer: </label>
                        <input class="form-control" type="text" name="lesplaatsnummer" id="lesplaatsnummer" value="<?php echo $row['lesplaatsnummer'];?>"> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Modules
              </div>
              <div class="panel-body">
                <?php $modulerow = mysql_fetch_array($module);?>
                <div class="form-group">
                  <label for "module1">Module 1: </label>
                  <input class="form-control" type="text" name="module1" id="module1" value="<?php echo $modulerow['module'];?>"> 
                </div> 
                <?php $modulerow = mysql_fetch_array($module);?>
                <div class="form-group">
                  <label for "module2">Module 2: </label>
                  <input class="form-control" type="text" name="module2" id="module2" value="<?php echo $modulerow['module'];?>"> 
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

                  $time = mysql_fetch_array($times);


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
                        <?php
                        if (($time['dag'] == $i) && $time)
                        {
                        ?>
                        
                          <label class="col-sm-3 control-label"><?php echo $label ?></label>
                          <div class="col-md-9">
                            <div class="row">
                              <div class="col-sm-8">
                                <div class="input-group input-daterange">
                                  <span class="input-group-addon">van</span>
                                  <input type="text" class="form-control timepicker" name="<?php echo $start?>" id="<?php echo $start?>" value="<?php echo $time['beginuur']?>">
                                  <span class="input-group-addon">tot</span>
                                  <input type="text" class="form-control timepicker" name="<?php echo $end?>" id="<?php echo $end?>" value="<?php echo $time['einduur']?>">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <span> <br><br></span>
                        <?php
                        $time = mysql_fetch_array($times);
                        } else
                        {
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
                    
                  }
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
                <button type="submit" class="btn btn-default">Aanpassen</button>
                <button type="reset" class="btn btn-default">Reset</button>
              </td>
            </tr>
          </table>
        </div>

        </form>
  </div>
  </div>
  </div>


  
    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>

</body>

</html>

