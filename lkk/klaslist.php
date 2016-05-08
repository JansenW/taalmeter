<?php
require_once 'include/secureHeader.php';

require_once 'include/constants.inc.php';

$courses = get_all_courses();

require 'template/courselist.php';
?>