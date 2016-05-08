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
    include 'include/navigationevaluation.php';

//create a database connection
    include 'include/constants.inc.php';

//select database
    $link = open_database_connection();
  
//create the query
    $result = mysqli_query($link, "select cursuscode, cursusnaam, schooljaar
                         from klassen");

    $cursus = mysqli_real_escape_string($link, $_POST['cursus']);

    $students = mysqli_query($link, "select StudentNumber, FirstName, LastName from student where StudentNumber in (select StudentNumber from studentklas where cursuscode = '$cursus') order by firstname, lastname, studentnumber");


  ?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-header">Nieuwe evaluatie maken</h2>
        </div>
      </div>
      <form action="evaluationaddtable.php?id=<?php echo $cursus?>" method="post" role="form">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Stap 2/2 - Vul de evaluatie gegevens in
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-2">
                
                  <label for="evaluationdate">Datum: </label>
                  <input class="form-control" type="date" name="evaluationdate" id="evaluationdate" autofocus>
               
              </div>
              <div class="col-lg-4">
              </div>
              <div class="col-lg-3">
                
                  <label for="task">Taaltaak: </label>
                  <input class="form-control" type="text" name="task" id="task">
                
              </div>
              <div class="col-lg-3">
                
                  <label for="selectlp">Selecteer een leerplan: </label>
                  <input class="form-control" type="text" name="selectlp" id="selectlp" autofocus>
                
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-6">


                  <label for="reference">Referentie: </label>
                      <input class="form-control" type="text" name="reference" id="reference">


                      <label for="goal">Basis competenties: </label>
                        <select name="goal" id="goal" class="form-control" >
                        <option selected value="">Kies een optie</option>                            
                        <?php
                          $goal = mysqli_query($link, "select learninggoal from goal");
                        
                          while ($goalrow = mysqli_fetch_array($goal))
                          {
                            echo "<option>".$goalrow['learninggoal']."</option>";
                          }
                        ?>
                        </select>
                      

                      <label for="category">Tekstcategorie: </label>
                      <input class="form-control" type="text" name="category" id="category">

                      <label for="level">Verwerkingsniveau: </label>
                      <input class="form-control" type="text" name="level" id="level">
                    </div>
                  <div class="col-lg-6">

                      <label for="role">Rol: </label>
                      <select name="role" id="role" class="form-control" >
                        <option selected value="">Kies een optie</option>
                            
                        <?php
                          $role = mysqli_query($link, "select role from role");
                        
                          while ($rolerow = mysqli_fetch_array($role))
                          {
                            echo "<option>".$rolerow['role']."</option>";
                          }
                        ?>
                        </select>
                  

                        <label for="form">Werkvorm: </label>
                        <select name="form" id="form" class="form-control" >
                        <option selected value="">Kies een optie</option>                            
                        <?php
                          $form = mysqli_query($link, "select werkvorm from werkvormen");
                        
                          while ($formrow = mysqli_fetch_array($form))
                          {
                            echo "<option>".$formrow['werkvorm']."</option>";
                          }
                        ?>
                        </select>

                        <label for="domain">Domein: </label>
                        <select name="domain" id="domain" class="form-control" >
                        <option selected value="">Kies een optie</option>                            
                        <?php
                          $domain = mysqli_query($link, "select domain from domain");
                        
                          while ($domainrow = mysqli_fetch_array($domain))
                          {
                            echo "<option>".$domainrow['domain']."</option>";
                          }
                        ?>
                        </select>

                        <label for="evaluationtext">Tekstsoort: </label>
                        <select name="evaluationtext" id="evaluationtext" class="form-control" >
                        <option selected value="">Kies een optie</option>                            
                        <?php
                          $text = mysqli_query($link, "select tekst from teksten");
                        
                          while ($textrow = mysqli_fetch_array($text))
                          {
                            echo "<option>".$textrow['tekst']."</option>";
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                  <div class="col-lg-12">

                        <label for="remarks">Opmerkingen: </label>
                        <textarea class="form-control" type="text" rows="3" name="remarks" id="remarks"></textarea>
                      <br>

                      
                      </div>
                      </div>
                      
              </div>           
              
              <div class="col-lg-6">
              <br>
            <div class="panel panel-primary">
              
              <div class="panel-body">
                <?php
                  $i = 1;
                  while ($student = mysqli_fetch_array($students))
                  {
                ?>
                  <div class="col-lg-5">
                  <label for="student<?php echo $i?>"><?php 
                        echo "&nbsp;".$student['FirstName']." ".$student['LastName'];
                        ?>: </label>
                  <?php $stud="student".$i;?>
                  </div>
                  <div class="col-lg-1">
                  <input type="text" name="student<?php echo $i?>" id="<?php echo $stud?>" maxlength="2" size="1">
                  </div>
                <?php
                  $i++;
                  }
                ?>
                
              </div>
            </div>
          </div>

            </div>
            <button type="submit" class="btn btn-default">Volgende</button>
          </div>
        </div>
      </form>
    </div>
  </div>

    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>

</body>

</html>

