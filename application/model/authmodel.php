<?php
class authModel {
	public function getAuth($authID) {
		if(_Auths_Left > 0) {
			$res = mysql_query("SELECT * FROM auths WHERE authID = '".mysql_real_escape_string($authID)."'");

			$ds = mysql_fetch_array($res);
			
			$Auth = Array('name' => getName($ds['key']), 'auth' => $ds['auth'], 'working' => $ds['working'], 'rate' => $ds['authID']);
			
			mysql_query("INSERT INTO `showed` (`id`, `userID`, `authID`) VALUES (NULL, '"._UserID."', '".$authID."');");
		} else {
			$Auth = "You've already seen all of your daily auths";
		}
		return $Auth;
	}
	
}