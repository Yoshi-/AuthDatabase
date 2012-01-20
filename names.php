<?php
/*
SELECT * FROM auths LEFT JOIN names ON names.key=auths.key WHERE names.name IS NULL
*/ 

//OBSOLETE FILE USE /ADMIN

include "_mysql.php";
include "_settings.php";
if(isset($_POST['name']) AND (isset($_SESSION['logged']) AND $_SESSION['logged'] == 1)) {
	$count = count($_POST['name']);
	$i = 0;
	$insert = "VALUES ";
	$name = $_POST['name'];
	$key = $_POST['key'];
	while($i < $count) {
		if(empty($name[$i])) {}
		else {
			$insert .= '(NULL , "'.mysql_real_escape_string(htmlentities($name[$i])).'", "'.mysql_real_escape_string(htmlentities($key[$i])).'"),';
		}
		$i++;
	}
	$insert = trim($insert, ',');;
	$query = "INSERT IGNORE INTO `names` (`nameID` ,`name` ,`key`) ". $insert;

	mysql_query($query);
	$content = 'Names Added';
}
elseif((isset($_POST['pwd']) AND $_POST['pwd'] == "RECode599") OR (isset($_SESSION['logged']) AND $_SESSION['logged'] == 1)) {
	$_SESSION['logged'] = 1;
	$query = "SELECT a.auth,a.key,n.name FROM auths a LEFT JOIN names n ON n.key=a.key WHERE n.name IS NULL";
	$res = mysql_query($query);
	
	$template = new Template('templates', 'addNames.tpl');
	
	$template -> addVariable('res', $res)
			  -> _loadTemplate();
			  
	$content = $template -> _run();
}
else {
	$template = new Template('templates', 'login.tpl');
	$template -> _loadTemplate();
	$content = $template -> _run();
}
$template = new Template('templates', 'index.tpl');
$template -> addVariable('content', $content)
          -> _loadTemplate();
echo $template -> _run();