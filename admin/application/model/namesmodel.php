<?php
class namesModel {
	public function getNames() {
		$res = mysql_query("SELECT * FROM names") or die(mysql_error());
		$names = array();
		while($names[] = mysql_fetch_array($res)) {
		}
		return $names;
	}
	
	public function getUnknownNames() {
		$query = "SELECT a.auth,a.key,n.name FROM auths a LEFT JOIN names n ON n.key=a.key WHERE n.name IS NULL";
		$res = mysql_query($query);
		
		while($names[] = mysql_fetch_array($res)) {
		}
		return $names;
	}
	public function saveUnknownNames() {
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
		return $content;
	}
	public function deleteName($nameID) {
		if(!empty($nameID)) {
			$nameID = (int) $nameID;
			$query = "DELETE FROM names WHERE nameID ='".mysql_real_escape_string($nameID)."'";
			mysql_query($query);
			return "Name deleted";
		}
		else {
			return "Please choose a Name";
		}
	}
	
	public function getName($nameID) {
		$nameID = mysql_real_escape_string($nameID);
		$query = "SELECT * FROM names WHERE nameID = '".$nameID."'";
		$res = mysql_query($query);
		$name = mysql_fetch_array($res);
		return $name;
	}
	
	public function saveEdit() {
		if(isset($_POST['nameID']) AND isset($_POST['name']) AND isset($_POST['key'])) {
			$query = "UPDATE names SET name='".mysql_real_escape_string(htmlentities($_POST['name']))."', names.key ='".mysql_real_escape_string(htmlentities($_POST['key']))."' WHERE nameID ='".intval($_POST['nameID'])."'";
			mysql_query($query);
			return "Name edited successful";
		}
		else return "Please fill all fields";
	}
}