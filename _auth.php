<?php
function isInUserGroup($usergroupid) {
	$groupsarr = "22 19 26 13 12 11 7 6 5";
    $validgroup = explode(" ", $groupsarr);

    foreach ($validgroup as $x) {
        if ($usergroupid == $x) {
            return true;
        }
    }
    return false;
}

chdir('../');
include('./global.php');  
chdir('authdb/');

if(!isInUserGroup($vbulletin->userinfo["usergroupid"])) {
	header("Location: http://recoders.org/login.php");
	exit;
}