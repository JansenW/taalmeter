<!DOCTYPE html>
<?php include 'include/secureHeader.php'; ?>
<html>
<head>

</head>
<body>

<?php
  include 'include/constants.inc.php';


$q = $_GET["q"];

$con = open_database_connection();

$sql="select cursuscode, cursusnaam, schooljaar from klassen WHERE cursuscode = '$q'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$students = mysqli_query($con, "select StudentNumber, FirstName, LastName from student where StudentNumber in (select StudentNumber from studentklas where cursuscode = '$q') order by firstname, lastname, studentnumber");
?>

    <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Klas gegevens
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">  
                  <tbody>
            <tr>
                <td>
                    <b>Cursusnaam</b>
                </td>
                <td>
                    <?php echo $row['cursusnaam'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <b>schooljaar</b>
                </td>
                <td>
                    <?php echo $row['schooljaar'];?>
                </td>
            </tr> 
        </tbody>
                </table>
              </div>
            </div>
          </div>




    <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Studenten score
              </div>
              <div class="panel-body">
                <?php
                  $i = 1;
                  while ($student = mysqli_fetch_array($students))
                  {
                ?>
                <div class="form-group">
                  <label for="student<?php echo $i?>"><?php 
                        echo $student['FirstName']." ".$student['LastName'];
                        ?>: </label>
                  <?php $stud="student".$i;?>
                  <input type="text" name="student<?php echo $i?>" id="<?php echo $stud?>" maxlength="2" size="4">
                </div>
                <?php
                  $i++;
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
<?php
    
mysqli_close($con);
?>
</body>
</html>