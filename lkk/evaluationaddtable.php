<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
</head>
<body>

<?php


//create a database connection
include 'include/constants.inc.php';

$link = open_database_connection();


$evaluationdate = mysqli_real_escape_string($link, $_POST['evaluationdate']);
$task = mysqli_real_escape_string($link, $_POST['task']);
$selectgoal = mysqli_real_escape_string($link, $_POST['selectlp']);
$reference = mysqli_real_escape_string($link, $_POST['reference']);
$goal = mysqli_real_escape_string($link, $_POST['goal']);
$category = mysqli_real_escape_string($link, $_POST['category']);
$level = mysqli_real_escape_string($link, $_POST['level']);
$role = mysqli_real_escape_string($link, $_POST['role']);
$form = mysqli_real_escape_string($link, $_POST['form']);
$domain = mysqli_real_escape_string($link, $_POST['domain']);
$remarks = mysqli_real_escape_string($link, $_POST['remarks']);

$cursus = $_GET["id"];
echo $cursus;


$evaluation = mysqli_query($link, 'select max(evaluationid) as maximum from evaluation');
$evaluationrow = mysqli_fetch_array($evaluation);
$evaluationid = $evaluationrow['maximum'];
$evaluationid++;
echo "evaluationid".$evaluationid;
// attempt insert query execution
$sql = "INSERT INTO evaluation (evaluationid, evaluationdate, task, selectgoal, reference, goal, category, level, form, domain, remarks) 
        VALUES ('$evaluationid','$evaluationdate', '$task', '$selectgoal', '$reference', '$goal', '$category', '$level', '$form', '$domain', '$remarks')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
$students = mysqli_query($link, "select StudentNumber, FirstName, LastName from student where StudentNumber in (select StudentNumber from studentklas where cursuscode = '$cursus') order by firstname, lastname, studentnumber");



$i = 1;
while ($student = mysqli_fetch_array($students))
{
  $stud = "student".$i;
  $score = mysqli_real_escape_string($link, $_POST[$stud]);
  $studentnumber = $student['StudentNumber'];
$sql = "INSERT INTO Result (CursusCode, StudentNumber, EvaluationId, Score) values ('$cursus','$studentnumber',$evaluationid, '$score')";


  if(mysqli_query($link, $sql)){
    echo "score added successfully.";
} else{
    echo "ERROR score: Could not execute: $sql. " . mysqli_error($link);
}
  $i++;
}

mysqli_close($link);
header("location:evaluationclasslist.php?id=$cursus");
?>



</body>
</html>