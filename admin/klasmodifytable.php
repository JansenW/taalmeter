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

$value = $_GET["id"];

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$cursusnaam = mysqli_real_escape_string($link, $_POST['cursusnaam']);
$opleiding = mysqli_real_escape_string($link, $_POST['opleiding']);
$titularis = mysqli_real_escape_string($link, $_POST['titularis']);
$module1 = mysqli_real_escape_string($link, $_POST['module1']);
$module2 = mysqli_real_escape_string($link, $_POST['module2']);
$begindatum = mysqli_real_escape_string($link, $_POST['begindatum']);
$einddatum = mysqli_real_escape_string($link, $_POST['einddatum']);
$centrumnummer = mysqli_real_escape_string($link, $_POST['centrumnummer']);
$lesplaatsnummer = mysqli_real_escape_string($link, $_POST['lesplaatsnummer']);

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
$sql = "UPDATE klassen SET
        cursusnaam = '$cursusnaam', 
        opleiding = '$opleiding',
        titularis = '$titularis',
        begindatum = '$begindatum', 
        einddatum = '$einddatum',
        centrumnummer = '$centrumnummer',
        lesplaatsnummer = '$lesplaatsnummer'
        WHERE cursuscode = '$value'";



if(mysqli_query($link, $sql)){
    echo "Records 1 updated successfully.";
} else{
    echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
}

$result = mysqli_query($link, "select module from module where cursuscode = '$value' and modulenummer = 1");
$numberrows = mysqli_num_rows($result);
if ($numberrows == 0 and $module1 != '')
{
  if (mysqli_query($link, "INSERT INTO module (module, cursuscode, modulenummer) values ('$module1', '$value', 1)"))
  {
    echo "; Module toegevoegd.";
  } 
  else
  {
    echo "ERROR: " . mysqli_error($link);
  }
} 
else
{ 
  if ($module1 == '' and $numberrows > 0)
  {
    if (mysqli_query($link, "DELETE FROM module where cursuscode = '$value' and modulenummer = 1"))
    {
      echo "; Module verwijderd.";
    }
    else
    {
      echo  "ERROR: " . mysqli_error($link);
    }
  }
  else
  {
    if (mysqli_query($link, "UPDATE module set module = '$module1' where cursuscode = '$value' and modulenummer = 1"))
    {
      echo "; Module aangepast.";
    }
    else
    {
      echo  "ERROR: " . mysqli_error($link);
    }
  }
}


$result = mysqli_query($link, "select module from module where cursuscode = '$value' and modulenummer = 2");
$numberrows = mysqli_num_rows($result);
if ($numberrows == 0 and $module2 != '')
{
  if (mysqli_query($link, "INSERT INTO module (module, cursuscode, modulenummer) values ('$module2', '$value', 2)"))
  {
    echo "; Module 2 toegevoegd.";
  } 
  else
  {
    echo "ERROR: " . mysqli_error($link);
  }
} 
else
{ 
  if ($module2 == '' and $numberrows > 0)
  {
    if (mysqli_query($link, "DELETE FROM module where cursuscode = '$value' and modulenummer = 2"))
    {
      echo "; Module 2 verwijderd.";
    }
    else
    {
      echo  "ERROR: " . mysqli_error($link);
    }
  }
  else
  {
    if (mysqli_query($link, "UPDATE module set module = '$module2' where cursuscode = '$value' and modulenummer = 2"))
    {
      echo "; Module 2 aangepast.";
    }
    else
    {
      echo  "ERROR: " . mysqli_error($link);
    }
  }
}

$i = 1;
while ($i < 8) 
{
  $result = mysqli_query($link, "SELECT dag, beginuur, einduur from lestijden where cursuscode = '$value' and dag = '$i'");
  $numberrows = mysqli_num_rows($result); 

  switch ($i) {
    case 1:
      $start = $beginma;
      $end = $eindma;
    break;
    case 2:
      $start = $begindi;
      $end = $einddi;
    break;
    case 3:
      $start = $beginwo;
      $end = $eindwo;
    break;
    case 4:
      $start = $begindo;
      $end = $einddo;
    break;
    case 5:
      $start = $beginvr;
      $en
      = $eindvr;;
      break;
    case 6:
      $start = $beginza;
      $end = $eindza;
    break;
    case 7:
      $start = $beginzo;
      $end = $eindzo;
      break;
    default:
      $start = "error";
      $end = "error";
  }

  if ($numberrows == 1)
  {
    if ($start == ''){
      $sqldelete = "delete from lestijden where cursuscode = $value and dag = $i";
      if(mysqli_query($link, $sqldelete)){
        echo "Records $i deleted successfully.";
      } else{
        echo "ERROR: Unable to delete $sql. " . mysqli_error($link);
      }
    }
    else
    {
      $sqlupdate = "update lestijden set beginuur = '$start', einduur = '$end' where cursuscode = $value and dag = $i";
      if(mysqli_query($link, $sqlupdate)){
        echo "Records $i updated successfully.";
      } else{
        echo "ERROR: Unable to update $sql. " . mysqli_error($link);
      }
    }
  } else {
    if ($start != ''){
      $sqlinsert = "insert into lestijden (cursuscode, dag, beginuur, einduur)
                    VALUES ($value, $i, '$start', '$end')";
      if(mysqli_query($link, $sqlinsert)){
        echo "Records $i inserted successfully.";
      } else{
        echo "ERROR: Unable to insert $sql. " . mysqli_error($link);
      }
    }
  }
  $i++;
}
 
// close connection
mysqli_close($link);

header("location:klaslist.php");

?>


</body>
</html>