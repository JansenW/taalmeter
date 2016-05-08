<?php 
  $title = 'Taalmeter';
  $pageheader = 'Details van een cursist'; 
?>

<?php ob_start() ?>
<div class="col-lg-6">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <?php 
      echo $student['FirstName'];
      echo " ";
      echo $student['LastName'];
      ?> 
    </div>
    <div class="panel-body">
      <div class="dataTable_wrapper">
        <table class="table table-bordered table-hover" id="dataStudent">
          <tbody>
            <tr>
              <td>
                <b>Id:</b>
              </td>
              <td>
                <?php 
                echo $student['StudentNumber'];
                ?> 
              </td>
            </tr>
    
            <tr>
              <td>
                <b>Geboortedatum:</b>
              </td>
              <td>
                <?php 
                echo $student['DateOfBirth'];
                ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Nationaliteit:</b>
              </td>
              <td>
                <?php 
                echo $student['Nationality'];
                ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Straat:</b>
              </td>
              <td>
                <?php 
                echo $student['Street'];
                ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Postcode:</b>
              </td>
              <td>
                <?php 
                echo $student['PostCode'];
                ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Gemeente:</b>
              </td>
              <td>
                <?php 
                echo $student['Commune'];
                ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Telefoon nummer:</b>
              </td>
              <td>
                <?php 
                echo $student['TelephoneNumber'];
                ?>
              </td>
            </tr>

            <tr>
              <td>
                <b>Email:</b>
              </td>
              <td>
                <?php 
                echo $student['Email'];
                ?>
              </td>
            </tr>
            <tr>
              <td>
                <b>Gsm nummer:</b>
              </td>
              <td>
                <?php 
                echo $student['MobileNumber'];
                ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-6">
  <div class="panel panel-primary">
    <div class="panel-heading">
      gevolgde cursusen
    </div>
    <div class="panel-body">
      <div class="dataTable_wrapper">
        <table class="table table-bordered table-hover" id="dataStudent">
          <thead>
            <tr>
              <th>Cursus code:</th>
              <th>Cursus naam:</th>
              <th>Schooljaar:</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($studentcourses as $studentcourse):
              $cursuscode = $studentcourse['cursuscode'];
              $klaslijst = get_course_by_id($cursuscode);
            ?>
              <tr>
                <td>
                  <a href="klasconsult.php?id=<?php echo $cursuscode;?>">
                  <?php 
                    echo $cursuscode;
                  ?> 
                  </a>
                </td>
                <td>
                  <?php 
                    echo $klaslijst['cursusnaam'];
                  ?> 
                </td>
                <td>
                  <?php 
                    echo $klaslijst['schooljaar'];
                  ?> 
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

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>

