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
          <form action="evaluationaddtable.php" method="post" role="form">
          <div class="col-lg-12">
          <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Evaluatie gegevens
              </div>
              <div class="panel-body">
                <form action="evaluationaddtable.php" method="post" role="form">
                  <div class="form-group">
                    <label for="date">Datum: </label>
                    <input class="form-control" type="date" name="date" id="date" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="task">Taaltaak: </label>
                    <input class="form-control" type="text" name="task" id="task">
                  </div>
                  <div class="form-group">
                    <label for="goal1">Leerplan doel 1: </label>
                    <input class="form-control" type="text" name="goal1" id="goal1">
                  </div>
                  <div class="form-group">
                    <label for="goal2">Leerplan doel 2: </label>
                    <input class="form-control" type="text" name="goal2" id="goal2">
                  </div>
                  <div class="form-group">
                    <label for="goal3">Leerplan doel 3: </label>
                    <input class="form-control" type="text" name="goal3" id="goal3">
                  </div>
                  <div class="form-group">
                    <label for="form">Werkvorm: </label>
                    <input class="form-control" type="text" name="form" id="form">
                  </div>
                  <div class="form-group">
                    <label for="text">Tekst: </label>
                    <input class="form-control" type="text" name="text" id="text">
                  </div>
                  <div class="form-group">
                    <label for="freelements">Onderst. Elementen: </label>
                    <input class="form-control" type="text" name="freelements" id="freelements">
                  </div>
                  <div class="form-group">
                    <label for="referencecursuspage">Referentie cursus pagina: </label>
                    <input class="form-control" type="text" name="referencecursuspage" id="referencecursuspage">
                  </div>
                  <div class="form-group">
                    <label for="referenceteacherpage">Referentie leraar pagina: </label>
                    <input class="form-control" type="text" name="referenceteacherpage" id="referenceteacherpage">
                  </div>
                  <div class="form-group">
                    <label for="referenceownpage">Referentie eigen pagina: </label>
                    <input class="form-control" type="text" name="referenceownpage" id="referenceownpage">
                  </div>
                  <div class="form-group">
                    <label for="referencetext">Referentie tekst: </label>
                    <input class="form-control" type="text" name="referencetext" id="referencetext">
                  </div>
                  <div class="form-group">
                    <label for="domain">Domein: </label>
                    <input class="form-control" type="text" name="domain" id="domain">
                  </div>
                  <div class="form-group">
                    <label for="role">Rol: </label>
                    <input class="form-control" type="text" name="role" id="role">
                  </div>
                  <div class="form-group">
                    <label for="remarks">Opmerkingen: </label>
                    <input class="form-control" type="text" name="remarks" id="remarks">
                  </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
          </div>
          </div>
          </form>
        </div>
        </div>
        </div>
      </div>
    </div>
  
  
    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>

</body>

</html>

