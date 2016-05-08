<?php include 'include/secureHeader.php'; ?>

<?php

$uploadedStatus = 0;

if ( isset($_POST["submit"]) ) {
if ( isset($_FILES["file"])) {
//if there was an error uploading the file
if ($_FILES["file"]["error"] > 0) {
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else {
if (file_exists($_FILES["file"]["name"])) {
unlink($_FILES["file"]["name"]);
}
$storagename = "klas.xlsx";
move_uploaded_file($_FILES["file"]["tmp_name"],  $storagename);
$uploadedStatus = 1;

}
} else {
echo "No file selected <br />";
}
}

?>

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
    <?php if($uploadedStatus==1){
        header("location:klasfileupload.php");

    } 
    else
        { 

         include 'include/navigationklas.php';

//create a database connection
include 'include/constants.inc.php';


?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">Klas bestand opladen</h2>
    </div>
        <!-- /.col-lg-12 -->
  </div>



  <div class="row">
    <div class="col-lg-3">
  </div>

    <div class="col-lg-6">
      <div class="panel panel-primary">
            <div class="panel-heading">
              Excel lijst opladen
            </div>
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table>
    
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <tr>
              <td><input class="btn btn-default" type="file" name="file" id="file"/> </td>

              <td align="right"><button type="submit" name="submit" class="btn btn-primary">Aanpassen</button></td>

           </tr>

        </form>
      </table>
    </div>
    </div>
  </div>
</div>
</div>
</div>

<?php

}?>
</div>


    <!-- jQuery -->
    <?php include 'include/cssend.php'; ?>
</body>

</html>

