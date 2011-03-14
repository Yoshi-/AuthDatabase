<?php
class indexModel {
	public function getAuths($filter = array()) {
	
		$where = '';
		foreach($filter as $key=>$value) {
			if($key == 0) $where = 'WHERE';
			else $where .= ' OR ';
			$where .= ' auths.key = "'.mysql_real_escape_string($value).'"';
		}
		
		if(isset($_REQUEST['page'])) $page = (int) $_REQUEST['page'];
		else $page = 1;
		
		if($page < 1) $page = 1;
		
		$res = mysql_query("SELECT * FROM auths ".$where." ORDER BY working DESC,authID DESC LIMIT ".(($page - 1) * _Auths_Per_Page).", "._Auths_Per_Page);

		$Auths = Array();
		while($ds = mysql_fetch_array($res)) {
			$Auths[] = Array('name' => getName($ds['key']), 'auth' => $ds['auth'], 'working' => $ds['working'], 'rate' => $ds['authID'], 'username' => $ds['name']);
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
	
	public function getHighestPage() {
		if(isset($_GET['filter'])) $filter = $_GET['filter'];
		else $filter = array();
		
		$where = 'WHERE working > '._Remove_Disabled;
		foreach($filter as $key=>$value) {
			$where .= ' AND ';
			$where .= ' auths.key = "'.mysql_real_escape_string($value).'"'; 
		}
		$res = mysql_query("SELECT * FROM auths ".$where."");
		$num = mysql_num_rows($res);
		$page_number = ceil($num / _Auths_Per_Page);
		return $page_number;
	}
}