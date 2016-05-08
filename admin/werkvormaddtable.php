<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="0;URL='werkvormlist.php'">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
</head>
<body>

  <div class="container">
    <section class="color-8">
      <nav class="cl-effect-7" id="cl-effect-7">
        <a href="studentlist.php">Studenten</a>
        <a href="leerplanlist.php">Leerplan</a>
        <a href="klaslist.php">Klas</a>
        <a href="secretariaat.php">Secretariaat</a>
      </nav>
    </section>
  </div>

  <br>
  <br>
  <br>  
  <br>
  <br>


<?php


//create a database connection
include 'include/constants.inc.php';

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);





$werkvorm = mysqli_real_escape_string($link, $_POST['werkvorm']);

 
// attempt insert query execution
$sql = "INSERT INTO werkvormen (werkvorm) 
        VALUES ('$werkvorm')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    echo "<a href='werkvormlist.php'>Lijst</a><br><a href='werkvormadd.php'>Add</a>";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "<a href='werkvormlist.php'>Lijst</a>";
}
 
// close connection
mysqli_close($link);

?>


</body>
</html>