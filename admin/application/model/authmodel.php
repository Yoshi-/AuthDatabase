<?php
class authModel {
	public function getAuth($authID) {
	
		$res = mysql_query("SELECT * FROM auths WHERE authID = '".mysql_real_escape_string($authID)."'");

		$ds = mysql_fetch_array($res);
		
		$Auth = Array('name' => getName($ds['key']), 'auth' => $ds['auth'], 'working' => $ds['working'], 'rate' => $ds['authID']);
	
		return $Auth;
	}
	
}