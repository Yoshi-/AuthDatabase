<?php
class indexModel {
	public function getAuths($filter = array()) {
	
		$where = 'WHERE working > '. _Remove_Disabled;
		$filter_query = '';
		foreach($filter as $key=>$value) {
			if($key == 0) $filter_query = '';
			else $filter_query .= ' OR ';
			$filter_query.= ' auths.key = "'.mysql_real_escape_string($value).'"'; 
		}
		if(strlen($filter_query)) $where = $where . ' AND (' . $filter_query .')';
		
		
		if(isset($_GET['page'])) $page = (int) $_GET['page'];
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
		$res = mysql_query("SELECT n.* FROM auths a LEFT JOIN names n ON a.key = n.key WHERE a.working > ". _Remove_Disabled." AND n.name IS NOT NULL GROUP BY (a.key) ORDER BY n.name");

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
		
		$where = 'WHERE working > '. _Remove_Disabled;
		$filter_query = '';
		foreach($filter as $key=>$value) {
			if($key == 0) $filter_query = '';
			else $filter_query .= ' OR ';
			$filter_query.= ' auths.key = "'.mysql_real_escape_string($value).'"'; 
		}
		if(strlen($filter_query)) $where = $where . ' AND (' . $filter_query .')';
		
		$res = mysql_query("SELECT * FROM auths ".$where."");
		$num = mysql_num_rows($res);
		$page_number = ceil($num / _Auths_Per_Page);
		return $page_number;
	}
}