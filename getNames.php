<?php
require("_mysql.php");

mysql_connect($host, $user, $pwd);
mysql_select_db($db);
$res = mysql_query("SELECT * FROM names") or die(mysql_error());
while($ds = mysql_fetch_array($res)) {
	echo $ds['name'].":".$ds['key'].";";
}

?>