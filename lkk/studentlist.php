<?php
require_once 'include/secureHeader.php';

require_once 'include/constants.inc.php';

$students = get_all_students();

require 'template/studentlist.php';
?>