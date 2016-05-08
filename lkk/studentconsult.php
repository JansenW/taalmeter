<?php
require_once 'include/secureHeader.php';

require_once 'include/constants.inc.php';

$id = $_GET["id"];

$student = get_student_by_id($id);

$studentcourses = get_courses_by_student($id);

require 'template/studentconsult.php';
?>