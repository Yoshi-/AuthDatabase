<?php
mysql_connect($host, $user, $pwd);
mysql_select_db($db);

session_start();
if(!isset($_POST['securitytoken'])) {
	$token = md5(uniqid());
	$_SESSION['token'] = $token;
}


define('HASH', 'bbb530f2250538b8a139d0406d865c03');

define('_Auths_Per_Page', 75);
define('_Remove_Disabled', -3);
define('_PWD', 'RECode599');

function hasAdmin($usergroupid) {
	$groupsarr = "22 26 13 12 11 7 6 5";
    $validgroup = explode(" ", $groupsarr);

    foreach ($validgroup as $x) {
        if ($usergroupid == $x) {
            return true;
        }
    }
    return false;
}

chdir('../../');
include('./global.php');  
chdir('authdb/admin/');

if(!hasAdmin($vbulletin->userinfo["usergroupid"])) {
	header("Location: http://recoders.org/login.php");
	exit;
}

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
	else return 'UNKNOWN';
}


$res = mysql_query("SELECT username,opentag,closetag FROM vB_user WHERE userid = '".$userid."'");
echo mysql_error();
echo "SELECT username,opentag,closetag FROM vB_user WHERE userid = '".$userid."'";