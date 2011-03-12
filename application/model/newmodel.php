<?php
class newModel {
	public function saveAuths($auths) {
		global $vbulletin;
		if(isset($_POST['securitytoken']) AND isset($_SESSION['token']) AND $_SESSION['token'] == $_POST['securitytoken']) {
			unset($_SESSION['token']);
			if(isset($_POST['Auths'])) {
				$auths = $_POST['Auths'];
				preg_match_all('([0-9][0-9]?[0-9][xX][zZ][A-Z0-9]{5,13})', $auths, $matches);
				$insert = "VALUES ";
				foreach($matches[0] as $value) {
					$key = explode('xz', mb_strtolower($value));
					$insert .= '(NULL , "'.mysql_real_escape_string(htmlentities($value)).'", "0", "'.mysql_real_escape_string(htmlentities($key[0])).'", "'.$vbulletin->userinfo["userid"].'"),';
				}
				$insert = trim($insert, ',');
				$query = "INSERT IGNORE INTO `auths` (`authID` ,`auth` ,`working` ,`key`, `name`) ". $insert;

				$res = mysql_query($query);
				$content = 'Auths added';
			}
			else $content = 'No Auths were sent';
		}
		else $content = 'Please use the Form on our site';
		
		return $content;
	}
}