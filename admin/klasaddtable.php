<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
</head>
<body>

 
  <br>
  <br>
  <br>  
  <br>
  <br>


<?php


//create a database connection
include 'include/constants.inc.php';

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$cursuscode = mysqli_real_escape_string($link, $_POST['cursuscode']);
$cursusnaam = mysqli_real_escape_string($link, $_POST['cursusnaam']);
$opleiding = mysqli_real_escape_string($link, $_POST['opleiding']);
$titularis = mysqli_real_escape_string($link, $_POST['titularis']);
$module = mysqli_real_escape_string($link, $_POST['module']);
$begindatum = mysqli_real_escape_string($link, $_POST['begindatum']);
$einddatum = mysqli_real_escape_string($link, $_POST['einddatum']);
$centrumnummer = mysqli_real_escape_string($link, $_POST['centrumnummer']);
$lesplaatsnummer = mysqli_real_escape_string($link, $_POST['lesplaatsnummer']);
$schooljaar = mysqli_real_escape_string($link, $_POST['schooljaar']);

$beginma = mysqli_real_escape_string($link, $_POST['beginma']);
$eindma = mysqli_real_escape_string($link, $_POST['eindma']);

$begindi = mysqli_real_escape_string($link, $_POST['begindi']);
$einddi = mysqli_real_escape_string($link, $_POST['einddi']);

$beginwo = mysqli_real_escape_string($link, $_POST['beginwo']);
$eindwo = mysqli_real_escape_string($link, $_POST['eindwo']);

$begindo = mysqli_real_escape_string($link, $_POST['begindo']);
$einddo = mysqli_real_escape_string($link, $_POST['einddo']);

$beginvr = mysqli_real_escape_string($link, $_POST['beginvr']);
$eindvr = mysqli_real_escape_string($link, $_POST['eindvr']);

$beginza = mysqli_real_escape_string($link, $_POST['beginza']);
$eindza = mysqli_real_escape_string($link, $_POST['eindza']);

$beginzo = mysqli_real_escape_string($link, $_POST['beginzo']);
$eindzo = mysqli_real_escape_string($link, $_POST['eindzo']);

 

// attempt insert query execution
$sql = "INSERT INTO klassen (cursuscode, cursusnaam, opleiding, schooljaar, titularis, begindatum, einddatum, centrumnummer,lesplaatsnummer) 
        VALUES ('$cursuscode','$cursusnaam','$opleiding','$schooljaar','$titularis','$begindatum','$einddatum','$centrumnummer','$lesplaatsnummer')";


if(mysqli_query($link, $sql)){
    echo "Records added into the klas table.";
} else{
    echo "ERROR 0001: " . mysqli_error($link);
}

if ($module1 != '')
{
$sql = "INSERT INTO module (cursuscode, module, modulenummer)
        VALUES ('$cursuscode', '$module1', 1)";

if(mysqli_query($link, $sql)){
    echo "Records added into the module table.";
} else{
    echo "ERROR 00002A:" . mysqli_error($link);
}
}

if ($module2 != '')
{
$sql = "INSERT INTO module (cursuscode, module, modulenummer)
        VALUES ('$cursuscode', '$module2', 2)";

if(mysqli_query($link, $sql)){
    echo "Records added into the module table.";
} else{
    echo "ERROR 00002B:" . mysqli_error($link);
}
}

if ($beginma != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 1, '$beginma', '$eindma')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00003: Could not able to execute $sql. " . mysqli_error($link);
}
}

if ($begindi != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 2, '$begindi', '$einddi')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00004: Could not able to execute $sql. " . mysqli_error($link);
}
}
if ($beginwo != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 3, '$beginwo', '$eindwo')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00005: Could not able to execute $sql. " . mysqli_error($link);
}
}
if ($begindo != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 4, '$begindo', '$einddo')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00006: Could not able to execute $sql. " . mysqli_error($link);
}
}
if ($beginvr != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 5, '$beginvr', '$eindvr')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00007: Could not able to execute $sql. " . mysqli_error($link);
}
}
if ($beginza != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 6, '$beginza', '$eindza')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00008: Could not able to execute $sql. " . mysqli_error($link);
}
}
if ($beginzo != '') {
$sql = "INSERT INTO lestijden (cursuscode, dag, beginuur, einduur)
        VALUES ('$cursuscode', 7, '$beginzo', '$eindzo')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR 00009: Could not able to execute $sql. " . mysqli_error($link);
}
}


 
// close connection
mysqli_close($link);

header("location:klaslist.php");

?>


</body>
</html>