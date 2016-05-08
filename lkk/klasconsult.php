<?php
require_once 'include/secureHeader.php';

require_once 'include/constants.inc.php';

$id = $_GET["id"];

$course = get_course_by_id($id);

$modules = get_module_by_cursuscode($id);

$students = get_students_by_course($id);

$times = get_time_by_cursuscode($id);

require 'template/classconsult.php';
?>