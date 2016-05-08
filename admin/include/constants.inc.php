<?php
  $DB_HOST="localhost";
  //$DB_USER="cl34-jansenw";
  //$DB_PASS="losbandigwardje";
  //$DB_NAME="cl34-jansenw";

  $DB_USER="root";
  $DB_PASS="";
  $DB_NAME="taalmeter";



function open_database_connection()
{
  $DB_HOST="localhost";
  //$DB_USER="cl34-jansenw";
  //$DB_PASS="losbandigwardje";
  //$DB_NAME="cl34-jansenw";

  $DB_USER="root";
  $DB_PASS="";
  $DB_NAME="taalmeter";

    $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    return $link;
}

function close_database_connection($link)
{
    mysqli_close($link);
}

//Courses

function get_all_courses()
{
    $link = open_database_connection();

    $username = $_SESSION['myusername'];

    $result = mysqli_query($link, "select cursuscode, cursusnaam, opleiding, schooljaar, titularis 
                       			   from klassen 
                       			   where cursuscode in (select cursuscode 
                                                        from teacherclasses 
                                                        where username = '$username') 
                                    order by schooljaar, cursuscode");

    $courses = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    close_database_connection($link);

    return $courses;
}


function get_course_by_id($id)
{
  $link = open_database_connection();
  $username = $_SESSION['myusername'];
  $value = $id;

  $result = mysqli_query($link, "select cursuscode, cursusnaam, opleiding, schooljaar, titularis, begindatum, einddatum, centrumnummer, lesplaatsnummer
                                 from klassen where cursuscode = '$value' and 
                                 cursuscode in (select cursuscode 
                                                from teacherclasses 
                                                where username = '$username')");

  $row = mysqli_fetch_assoc($result);
  
  close_database_connection($link);

  return $row;

}


function get_courses_by_student($id)
{
  $link = open_database_connection();
  $username = $_SESSION['myusername'];
  $value = $id;

  $result = mysqli_query($link, "select cursuscode, StudentNumber from studentklas where StudentNumber = '$value'");

  $studentcourses = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $studentcourses[] = $row;
  }
  close_database_connection($link);

  return $studentcourses;

}

//module

function get_module_by_cursuscode($id)
{
  $link = open_database_connection();
  $value = $id;

  $result = mysqli_query($link, "select module from module where cursuscode = '$value' order by modulenummer");

  $modules = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $modules[] = $row;
  }
  close_database_connection($link);

  return $modules;

}


//Students
function get_all_students()
{
	$link = open_database_connection();

  $username = $_SESSION['myusername'];

	$result = mysqli_query($link, "select FirstName, LastName, StudentNumber, DateOfBirth, Nationality, Street, PostCode, Commune, TelephoneNumber, 
                                 Email, MobileNumber from student
                      	   		   where studentnumber in (select studentnumber 
                      	   						           from studentklas 
                           					               where cursuscode in (select cursuscode 
                                             							        from teacherclasses 
                                                                                where username = '$username')
												           ) 
	                               order by StudentNumber");

	$students = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
  }
  close_database_connection($link);

  return $students;
}

function get_student_by_id($studentnumber)
{
  $link = open_database_connection();
  $username = $_SESSION['myusername'];
  $value = $studentnumber;

  $result = mysqli_query($link, "select FirstName, LastName, StudentNumber, DateOfBirth, Nationality, Street, PostCode, Commune, TelephoneNumber, 
                                 Email, MobileNumber 
                                 from student 
                                 where StudentNumber = '$value' 
                                 and studentnumber in (select studentnumber 
                                                       from studentklas 
                                                       where cursuscode in (select cursuscode 
                                                                            from teacherclasses 
                                                                            where username = '$username')) 
                                 order by StudentNumber");

  $row = mysqli_fetch_assoc($result);
  close_database_connection($link);
  return $row;
}

function get_students_by_course($cursuscode)
{
  $link = open_database_connection();
  $username = $_SESSION['myusername'];
  $value = $cursuscode;

  $result = mysqli_query($link, "select StudentNumber, FirstName, LastName from student 
                                 where StudentNumber in (select StudentNumber 
                                                         from studentklas 
                                                         where cursuscode = '$value')");

  $students = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
  }
  close_database_connection($link);

  return $students;
}

//time


function get_time_by_cursuscode($cursuscode)
{
  $link = open_database_connection();
  $username = $_SESSION['myusername'];
  $value = $cursuscode;

  $result = mysqli_query($link, "select dag, beginuur, einduur from lestijden where cursuscode = '$value' order by dag");

  $times = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $times[] = $row;
  }
  close_database_connection($link);

  return $times;
}

?>