<?php
class newModel {
	public function saveAuths($auths) {
		global $vbulletin;
		if(isset($_POST['securitytoken']) AND isset($_SESSION['token']) AND $_SESSION['token'] == $_POST['securitytoken']) {
			unset($_SESSION['token']);
			if(isset($_POST['Auths'])) {
				$auths = $_POST['Auths'];
				preg_match_all('([0-9]{2,4}[xX][zZ][A-Z0-9]{5,13})', $auths, $matches);
				$insert = "VALUES ";
				$ototal = 0;
				foreach($matches[0] as $value) {
					$key = explode('xz', mb_strtolower($value));
					$insert .= '(NULL , "'.mysql_real_escape_string(htmlentities($value)).'", "0", "'.mysql_real_escape_string(htmlentities($key[0])).'", "'._UserID.'"),';
					$ototal++;
				}
				$insert = trim($insert, ',');
				$oldcount = mysql_num_rows(mysql_query("SELECT ROW_COUNT() FROM `auths`"));

				$query = "INSERT IGNORE INTO `auths` (`authID` ,`auth` ,`working` ,`key`, `name`)". $insert;
				$res = mysql_query($query);

				$newcount = mysql_num_rows(mysql_query("SELECT ROW_COUNT() FROM `auths`"));
				$total = $newcount - $oldcount;
				$content = $ototal.' codes were parsed. '.$total.' codes were submitted. <br />Please wait for the system to check if they are working to fund you with additional views.';
			}
			else $content = 'Please input codes';
		}
		else $content = 'Please refresh the form on our site';
		
		return '<center><div id="imgPreview">'.$content.'</div></center>';
	}
}