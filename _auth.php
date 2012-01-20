<?php

function isInUserGroup($usergroupid) {
	$groupsarr = "6 5 7 9 2"; //rsc
    //$groupsarr = "22 19 26 13 12 11 7 6 5"; //rec
    $validgroup = explode(" ", $groupsarr);

    foreach ($validgroup as $x) {
        if ($usergroupid == $x) {
            return true;
        }
    }
    return false;
}

//Custom code for vbulletin
function getUserLink($userid) {
	/*$res = mysql_query("SELECT username FROM vB_user WHERE userid = '".$userid."'");

	if(@mysql_num_rows($res)) {
		$ds = mysql_fetch_assoc($res);
		$name = '<a href="http://rscoders.org/member.php/'.$userid.'-'.$ds["username"].'" target="_blank">'.$ds["username"].'</a>';
	} else $name = '<a href="http://rscoders.org/member.php/1-Contra" target="_blank">Contra</a>';
	return $name;*/
	//Code for names goes here
	//see above for example for vbulletin
	return "Le Namé";
}

chdir('../');
include('./global.php');  
chdir('authdb/');

define('_Admin_Group_ID', 6); //Groups ID for Admins
define('_UserID', $vbulletin->userinfo["userid"]); 

if(_UserID == 70) define('_User_Group_ID', 6); //Exception to give user acess to backend that aren't in the admin group
else define('_User_Group_ID', $vbulletin->userinfo["usergroupid"]);

if(!isInUserGroup(_User_Group_ID)) {
	echo "You do not have access to the AuthDB. Log into your forum account and donate";
	//header("Location: http://recoders.org/login.php");
	exit;
}

switch(_User_Group_ID) { //Auths per dya
	case 6:
	case 5:
	case 7:
		$per_day = 1000;
	break;
	case 9:
	case 10:
		$per_day =  10;
    	break;
	default:
		$per_day = 0;
	break;
}




$res = mysql_query('SELECT * FROM auths WHERE name="'._UserID.'" AND working > "5"');
$anz = mysql_num_rows($res); //This code will add working Auths to the Auths per day
define('_Auths_Per_Day', ($per_day + $anz));

$res = mysql_query('SELECT * FROM showed WHERE userID="'._UserID.'"');
$anz = mysql_num_rows($res);
define('_Auths_Left', (_Auths_Per_Day - $anz));
?>