<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// require "_mysql.php";
// mysql_connect($host, $user, $pwd);
// mysql_select_db($db);
// define('HASH', file_get_contents('hash.txt'));
// $res = mysql_query("SELECT * FROM `auths` WHERE working > '-10' ORDER BY  working ASC,`lastchecked` ASC") or die(mysql_error());
// $ds = mysql_fetch_assoc($res);

// $jar  = '';
// $name = '';
// $key  = explode('xz', mb_strtolower($ds['auth']));

// $check = file_get_contents('https://impsoft.net/nexus/onstart.php?prodauth=' . $ds['auth'] . '&hash=' . HASH);

// if (!empty($check)) {
    // $check_arr = explode('##', $check);
    // if ($check_arr[4] == 1) {
        // echo 'working' . "\n";
        // $jar  = $check_arr[6];
        // $name = $check_arr[5];
        // mysql_query("UPDATE `auths` SET working='10', lastchecked='" . time() . "' WHERE auth='" . $ds['auth'] . "'");
        // $res = mysql_query("SELECT name FROM names WHERE names.key='" . $key[0] . "'");
        // if (mysql_num_rows($res) > 0)
            // mysql_query("UPDATE names SET name='" . mysql_real_escape_string($name) . "' WHERE names.key='" . $key[0] . "'");
        // else
            // mysql_query("INSERT INTO names (`nameID` ,`name` ,`key`) VALUES (NULL, '" . mysql_real_escape_string($name) . "', '" . $key[0] . "'");
        // $log = $ds['auth'] . " Working";
    // } elseif ($check_arr[4] == 0) {
        // $pos = strpos($check, "UPDATE");
        // if ($pos == false) {
            // echo 'disabled' . "\n";
            // mysql_query("UPDATE `auths` SET working='-10', lastchecked='" . time() . "' WHERE auth='" . $ds['auth'] . "'");
            // $log = $ds['auth'] . " Disabled";
        // } else {
            // echo 'hash out-of-date!';
            // $log = $ds['auth'] . " OUT OF DATE, IGNORED RETURN";
            // updateHash($check);
        // }
    // } else {
        // $pos = strpos($check, "UPDATE");
        // if ($pos == true) {
            // echo 'funk exception' . "\n";
            // mysql_query("UPDATE `auths` SET working='-10', lastchecked='" . time() . "' WHERE auth='" . $ds['auth'] . "'");
            // $log = $ds['auth'] . " Disabled - FUNK";
        // } else {
            // echo 'unknown error<br />';
            // $log = $ds['auth'] . " Error";
        // }
    // }
// } else {
    // echo 'unknown error<br />';
    // $log = $ds['auth'] . " Error";
// }
// if (!empty($jar)) {
    // $jar .= " - " . $name . "\r\n\r\n";
    // file_put_contents('jars.txt', $jar, FILE_APPEND);
// }
// $log = date("d-m-Y G:i:s") . " - " . $log . " - " . $check . "\r\n\r\n";
// file_put_contents('log.txt', $log, FILE_APPEND);
// echo $check;

// function updateHash($check)
// {
    // $data     = explode("#@#", $check);
    // $download = $data[6];
    // echo $download;
    // file_put_contents("nexus.jar", file_get_contents($download));
    // file_put_contents("hash.txt", strtoupper(md5_file("nexus.jar")));
// }
file_put_contents("hash.txt", strtoupper(md5_file("nexus.jar")));
?>