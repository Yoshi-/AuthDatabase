<?php
class indexModel {
	public function getAuths($filter = array()) {
	
		$where = '';
		foreach($filter as $key=>$value) {
			if($key == 0) $where = 'WHERE';
			else $where .= ' OR ';
			$where .= ' auths.key = "'.mysql_real_escape_string($value).'"';
		}
		
		$res = mysql_query("SELECT * FROM auths ".$where." ORDER BY working DESC,authID DESC");

		$Auths = Array();
		while($ds = mysql_fetch_array($res)) {
			$Auths[] = Array('name' => getName($ds['key']), 'auth' => $ds['auth'], 'working' => $ds['working'], 'rate' => $ds['authID']);
		}
		return $Auths;
	}
	
	public function getFilter($filter = array()) {
		$res = mysql_query("SELECT * FROM names ORDER BY name ASC");

		$names = Array();
		while($ds = mysql_fetch_array($res)) {
			if(in_array($ds['key'], $filter)) $selected = 1;
			else $selected = 0;
			$names[] = Array('name' => $ds['name'], 'key' => $ds['key'], 'selected' => $selected);
		}	
		return $names;
	}
}