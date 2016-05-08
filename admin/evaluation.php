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
  $result = mysqli_query($link, "select cursuscode, cursusnaam, schooljaar
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
          <h2 class="page-header">Evaluatie details</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Klas gegevens
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
                      <td>Schooljaar:</td>
                      <td><?php 
                        echo $row['schooljaar'];
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
                      <th>Score</th>   
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
                      <td>
                      <?php
                        $studentnumber = $student['StudentNumber'];
                        $score = mysqli_query($link, "select score from result where cursuscode = '$value' and studentnumber = '$studentnumber'");
                        $scorerow = mysqli_fetch_array($score);
                        echo $scorerow['score'];
                      ?>


                      </td>
                    </tr>
                    <?php
                    
                  }
                    ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <td>
                        Gemiddelde
                      </td>
                      <td>
                      <?php
                        $average = mysqli_query($link, "select sum(score)/count(*) as average from result where cursuscode = '$value'");

                        $averagerow = mysqli_fetch_array($average);
                        echo $averagerow['average'];
                      ?>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
          <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Evaluatie gegevens
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <tbody>
                    <tr>
                      <td>
                        Datum:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Vaardigheid:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Taaltaak:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Leerplandoel 1:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Leerplandoel 2:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Leerplandoel 3:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Werkvorm:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Tekst:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Onderst. Elementen:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Referentie:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Context:
                      </td>
                      <td>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Subcontext:
                      </td>
                      <td>
                      </td>
                    </tr>                    
                    <tr>
                      <td>
                        Opmerkingen:
                      </td>
                      <td>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
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

