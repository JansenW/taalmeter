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
<?php 
  include 'include/navigationklas.php';

//create a database connection
  include 'include/constants.inc.php';

//select database
  $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  $value = $_GET["id"];

//create the query
  $result = mysqli_query($link, "select *
                         from klassen where cursuscode = '$value'");

  $row = mysqli_fetch_array($result);

  $students = mysqli_query($link, "select StudentNumber, FirstName, LastName from student where StudentNumber in (select StudentNumber from studentklas where cursuscode = '$value')");

  $times = mysqli_query($link, "select dag, beginuur, einduur from lestijden where cursuscode = '$value' order by dag");

  $studentsselect = mysqli_query($link, "select StudentNumber, FirstName, LastName from student where StudentNumber not in (select StudentNumber from studentklas where cursuscode = '$value')");

  $moduleselect = mysqli_query($link, "select module from module where cursuscode = '$value' order by modulenummer");

?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Klas details</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Details van een klas
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th><?php 
                        echo $row['cursuscode'];
                        ?></th>
                      <th></th>    
                    </tr>  
                  </thead>  
                  <tbody>
                    <tr>
                      <td>cursusnaam:</td>
                      <td><?php 
                        echo $row['cursusnaam'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>opleiding:
                      </td>
                      <td><?php 
                        echo $row['opleiding'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Schooljaar:</td>
                      <td><?php 
                        echo $row['schooljaar'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>titularis:
                      </td>
                      <td><?php 
                        echo $row['titularis'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>begindatum:
                      </td>
                      <td><?php 
                        echo $row['begindatum'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>einddatum:</td>
                      <td><?php 
                        echo $row['einddatum'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>centrumnummer:
                      </td>
                      <td><?php 
                        echo $row['centrumnummer'];
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>lesplaatsnummer:</td>
                      <td><?php 
                        echo $row['lesplaatsnummer'];
                        ?>
                      </td>
                    </tr>
                    <?php
                    $i = 1;
                    while ($module = mysqli_fetch_array($moduleselect))
                    {
                    ?>
                    <tr>
                      <td>module <?php echo $i?>:</td>
                      <td><?php 
                        echo $module['module'];$i++;?>
                      </td>
                    </tr>
                    <?php
                    
                  }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
        



            <div class="panel panel-primary">
              <div class="panel-heading">
                Uurrroster
              </div>
              <div class="panel-body">

                <?php
                  $i = 1;

                  $time = mysqli_fetch_array($times);
                  while ($i < 8) 
                  {
                    if ($time['dag'] < $i) 
                    {
                      $time = mysqli_fetch_array($times); 
                    }

                    $label = "";

                    switch ($i) {
                      case 1:
                        $label = "Maandag";
                        break;
                      case 2:
                        $label = "Dinsdag";
                        break;
                      case 3:
                        $label = "Woensdag";
                        break;
                      case 4:
                        $label = "Donderdag";
                        break;
                      case 5:
                        $label = "Vrijdag";
                        break;
                      case 6:
                        $label = "Zaterdag";
                        break;
                      case 7:
                        $label = "Zondag";
                        break;
                      default:
                        $label = "error";

                    } 
                     
                    if (($time['dag'] == $i) && $time)
                    {
                      $beginuur = substr($time['beginuur'],0,5);
                      $einduur = substr($time['einduur'],0,5);
                    }
                    else
                    {
                      $beginuur = "";
                      $einduur = ""; 
                    }
                ?>
                    <div class="form-group">
                    <label for="exampleInputCompany" class="col-sm-3 control-label"><?php echo $label ?></label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-sm-8">
                            <div class="input-group input-daterange">
                              <span class="input-group-addon">van</span>
                              <input type="text" class="form-control timepicker" value="<?php echo $beginuur?>">
                              <span class="input-group-addon">tot</span>
                              <input type="text" class="form-control timepicker" value="<?php echo $einduur?>">
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
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Studenten
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Naam</th>
                      <th></th>   
                    </tr>  
                  </thead>  
                  <tbody>
                    <?php
                    while ($student = mysqli_fetch_array($students))
                    {
                    ?>
                    <tr>
                      <td><a href="studentconsult.php?id=<?php echo $student['StudentNumber'];?>"><?php 
                        echo $student['FirstName'];?>

                        <?php
                        echo $student['LastName'];
                        ?></a>
                      </td>
                      <td align="right">
                        <a href="studentremove.php?cursuscode=<?php echo $value;?>&StudentNumber=<?php echo $student['StudentNumber'];?>" title="verwijderen"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
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
                      <a href="studentklassadd.php?id=<?php echo $value;?>"><button type="button" class="btn btn-primary">Studenten toevoegen</button></a>
                    </td>
                  </tr>
                </table>
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

