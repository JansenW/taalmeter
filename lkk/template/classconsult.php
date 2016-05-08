<?php 
  $title = 'Taalmeter';
  $pageheader = 'Details van een cursus'; 
?>

<?php ob_start() ?>
<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-9">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Details van een klas
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-7">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?php 
                      echo $course['cursuscode'];
                    ?></th>
                    <th></th>    
                  </tr>  
                </thead>  
                <tbody>
                  <tr>
                    <td>cursusnaam:</td>
                    <td><?php 
                      echo $course['cursusnaam'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>opleiding:
                    </td>
                    <td><?php 
                      echo $course['opleiding'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Schooljaar:</td>
                    <td><?php 
                      echo $course['schooljaar'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>titularis:
                    </td>
                    <td><?php 
                      echo $course['titularis'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>begindatum:
                    </td>
                    <td><?php 
                      echo $course['begindatum'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>einddatum:</td>
                    <td><?php 
                      echo $course['einddatum'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>centrumnummer:
                    </td>
                    <td><?php 
                      echo $course['centrumnummer'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>lesplaatsnummer:</td>
                    <td><?php 
                      echo $course['lesplaatsnummer'];
                      ?>
                    </td>
                  </tr>
                  <?php
                    $i = 1;
                    foreach ($modules as $module):
                    ?>
                    <tr>
                      <td>module <?php echo $i?>:</td>
                      <td>
                        <?php 
                        echo $module['module'];
                        $i++;?>
                      </td>
                    </tr>
                    <?php
                    
                    endforeach
                    ?>
                </tbody>
              </table>
            </div>

            <div class="col-lg-1">
            </div>
            
            <div class="col-lg-4">
              <?php
              $i = 1;
              $time = reset($times);
              while ($i < 8) 
              {
                if ($time['dag'] < $i) 
                {
                  $time = next($times); 
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
                <b><?php echo $label ?></b>
                <div class="input-group input-daterange">
                  <span class="input-group-addon">van</span>
                  <input class="form-control timepicker" value="<?php echo $beginuur?>">
                  <span class="input-group-addon">tot</span>
                  <input class="form-control timepicker" value="<?php echo $einduur?>">                         
                </div>
                <?php
                $i++;
              }
              ?>
              <br>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Studenten
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Naam</th>
                </tr>  
              </thead>  
              <tbody>
                <?php
                foreach ($students as $student):
                ?>
                <tr>
                  <td>
                    <a href="studentconsult.php?id=<?php echo $student['StudentNumber'];?>"><?php 
                    echo $student['FirstName'].' '.$student['LastName'];?>
                    </a>
                  </td>                      
                </tr>
                <?php
                endforeach
                ?>
              </tbody>
            </table>                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>