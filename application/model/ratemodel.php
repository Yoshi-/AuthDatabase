<?php
class rateModel {
	public function rate($rate) {
		if(empty($rate)) return 'Please enter send an AuthID';
		
		if(isset($_GET['securitytoken']) AND isset($_SESSION['token']) AND $_SESSION['token'] == $_GET['securitytoken']) {
			$client_ip = $_SERVER['REMOTE_ADDR'];
			$res = mysql_query("SELECT * FROM rate WHERE ip='".$client_ip."' AND authID='".$rate."'");
			if(mysql_num_rows($res)) {
				return "Only 1 Vote per Ip/Auth";
			}
			if(isset($_GET['type']) AND $_GET['type'] = 'down') {
				mysql_query("UPDATE `auths` SET `working` = working -1 WHERE `authID` ='".$rate."'");
			}
			else {
				mysql_query("UPDATE `auths` SET `working` = working +1 WHERE `authID` ='".$rate."'");
			}
			mysql_query("INSERT INTO `rate` (`rateID` ,`ip` ,`authID`)VALUES (NULL , '".$client_ip."', '".$rate."');");
			return 'Rate accepted';
		}
		else echo 'No Access';
	}

}