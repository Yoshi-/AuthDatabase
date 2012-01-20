<?php
/*ini_set('display_errors', 1); 
error_reporting(E_ALL);*/
include "_mysql.php";
include "_settings.php";

$page = new FrontController();
$page -> run();
