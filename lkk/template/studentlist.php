<?php 
  $title = 'Taalmeter';
  $pageheader = 'Studenten lijst'; 
?>

<?php ob_start() ?>
<div class="col-lg-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Cursisten
    </div>
    <div class="panel-body">
      <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>Stamnummer</th>
              <th>Voornaam</th>
              <th>Achternaam</th>
              <th>E-mail</th>
              <th>Gsm</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($students as $student):
            ?>
            <tr>
              <td>
                <?php 
                echo $student['StudentNumber'];
                ?>
              </td>
              <td>
                <u>
                  <a href="studentconsult.php?id=<?php echo $student['StudentNumber'];?>">
                  <?php 
                  echo $student['FirstName'];
                  ?>
                  </a>
                </u>
              </td>
              <td>
                <?php 
                echo $student['LastName'];
                ?>
              </td>
              <td>
                <?php 
                echo $student['Email'];
                ?>
              </td>
              <td>
                <?php 
                echo $student['MobileNumber'];
                ?>
              </td>
              <td align="right"> 
                <a href="studentconsult.php?id=<?php echo $student['StudentNumber'];?>" title="details"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-search"></i></button></a>
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


