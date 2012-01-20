<?php
require("_mysql.php");
require("_settings.php");
$codeid = $_REQUEST["id"];

$res = mysql_query("SELECT * FROM names WHERE names.key = '".$codeid."'") or die(mysql_error());
if(mysql_num_rows($res)) {
	$ds = mysql_fetch_array($res);
	echo $ds['name'];
} else { 
	echo '???';
}
?>