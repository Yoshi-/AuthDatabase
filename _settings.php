<?php
mysql_connect($host, $user, $pwd);
mysql_select_db($db);

session_start();
if(!isset($_POST['securitytoken'])) {
	$token = md5(uniqid());
	$_SESSION['token'] = $token;
}

$pw_name = 'RECodenig';
define('HASH', 'bbb530f2250538b8a139d0406d865c03');
require('application/frontcontroller.class.php');
require('application/template.class.php');

function getName($key) {
	$res = mysql_query("SELECT * FROM names WHERE names.key = '".$key."'") or die(mysql_error());
	if(mysql_num_rows($res)) {
		$ds = mysql_fetch_array($res);
		return $ds['name'];
	}
	else return 'UNKNOWN';
}


function __autoload($class_name) {
	$class_name = strtolower($class_name);

	if(stripos($class_name, 'controller')) {
		$path = 'application/controller/'.$class_name.'.php';
	}
	elseif(stripos($class_name, 'view')) {
		$path = 'application/view/'.$class_name.'.php';
	}
	elseif(stripos($class_name, 'model')) {
		$path = 'application/model/'.$class_name.'.php';
	}
	else {
		die('Cant Find Class ' . $class_name); 
	}
	if(file_exists($path)) {
		require_once $path;
	}
	else die('Cant Find Class '. $class_name);
}