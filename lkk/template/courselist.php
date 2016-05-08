<?php 
  $title = 'Taalmeter';
  $pageheader = 'Klas lijst'; 
?>

<?php ob_start() ?>
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Klassen
      </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Cursuscode</th>
                <th>Cursusnaam</th>
                <th>Opleiding</th>
                <th>Schooljaar</th>
                <th>Titularis</th>
                <th></th>
              </tr>  
            </thead>  
            <tbody>
              <?php
              foreach ($courses as $course):
              ?>
              <tr>
                <td>
                  <?php 
                  echo $course['cursuscode'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $course['cursusnaam'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $course['opleiding'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $course['schooljaar'];
                  ?>
                </td>
                <td>
                  <?php 
                  echo $course['titularis'];
                  ?>
                </td>
                <td align="right"> 
                  <a href="klasconsult.php?id=<?php echo $course['cursuscode'];?>" title="consulteren"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-search"></i></button></a>
                  <a href="evaluationclasslist.php?id=<?php echo $course['cursuscode'];?>" title="evaluaties"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-graduation-cap"></i></button></a>
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


