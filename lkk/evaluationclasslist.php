<!DOCTYPE html>
<?php include 'include/secureHeader.php'; ?>
<html>
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

         include 'include/navigationevaluation.php';

//create a database connection
include 'include/constants.inc.php';


$q = $_GET["id"];

$con = open_database_connection();


  $result = mysqli_query($con, "select cursuscode
                         from klassen where cursuscode in (select cursuscode 
                                            from teacherclasses 
                                            where username = '$username') 
                          and cursuscode <> '$q' order by cursuscode");
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Evaluatie lijst</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Selecteer een klas
        </div>
        <div class="panel-body">
                
          <select name="cursus" id="cursus" class="form-control" onchange="javascript:location.href = this.value">
            <option value="<?php echo $q;?>" selected><?php echo $q;?></option>                            
            <?php                        
            while ($row = mysqli_fetch_array($result))
            {
            ?>
              <option value="evaluationclasslist.php?id=<?php echo $row['cursuscode'];?>"><?php echo $row['cursuscode'];?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="row">      
    <div class="col-lg-12">
      <div class="panel panel-primary">
            <div class="panel-heading">
              Klas: <?php echo $q;
              ?>
            </div>

      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
      <th>EvaluationId</th>
      <th>Taak</th>
      <th>Datum</th>
      <th>Gemiddelde score</th>
      <th></th>
    </tr>  
    </thead>  
    <tbody>
    <?php
    $evaluation = mysqli_query($con, "select EvaluationId, EvaluationDate, Task 
                               from evaluation 
                               where evaluationid in (select evaluationid from result where cursuscode = '$q')");
    if ($evaluation){
    while ($evaluationrow = mysqli_fetch_array($evaluation))
    {

      $EvaluationId = $evaluationrow['EvaluationId'];
      $average = mysqli_query($con, "select avg(score) as score from result where EvaluationId = $EvaluationId group by EvaluationId");
      $averagerow = mysqli_fetch_array($average);

    ?>

    <tr>
      <td><?php 
        echo $evaluationrow['EvaluationId'];
        ?>
      </td>
      <td><?php 
        echo $evaluationrow['Task'];
        ?>
      </td>
      <td><?php 
        echo $evaluationrow['EvaluationDate'];
        ?>
      </td>
      <td><?php 
        echo $averagerow['score'];
        ?>
      </td>      
      <td align="right"> 
        <a href="evaluationconsult.php?id=<?php echo $evaluationrow['EvaluationId'];?>" title="consulteren"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-search"></i></button></a>
      </td>
    </tr>
    <?php
  }
    }
    ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    
<?php
    
mysqli_close($con);
?>
    <!-- jQuery -->
<?php include 'include/cssend.php'; ?>
</body>
</html>