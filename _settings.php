<?php
mysql_connect($host, $user, $pwd);
mysql_select_db($db);

session_start();
if(!isset($_REQUEST['securitytoken'])) {
	$token = md5(uniqid());
	$_SESSION['token'] = $token;
}

define('_Auths_Per_Page', 200);
define('_Remove_Disabled', -3);

require("_auth.php");
define('HASH', file_get_contents('hash.txt'));

//Pw for Names.php
define('_PWD', 'RECode599'); //names.php is obsolete

require('application/autoloader.class.php');

spl_autoload_register('autoloader::load');
spl_autoload_register('autoloader::view');
spl_autoload_register('autoloader::model');
spl_autoload_register('autoloader::exception');
spl_autoload_register('autoloader::controller');

function getName($key) {
	$res = mysql_query("SELECT * FROM names WHERE names.key = '".$key."'") or die(mysql_error());
	if(mysql_num_rows($res)) {
		$ds = mysql_fetch_array($res);
		return $ds['name'];
	}
	else return 'Unknown';
}


function alreadyChecked($authID) {
	$res = mysql_query('SELECT * FROM showed WHERE userID="'._UserID.'" AND authID ="'.$authID.'"');
	$anz = mysql_num_rows($res);
	return $anz;
}

