<?php
require "_mysql.php";
mysql_connect($host, $user, $pwd);
mysql_select_db($db);
mysql_query("TRUNCATE TABLE `showed`");