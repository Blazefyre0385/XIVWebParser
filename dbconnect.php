<?php $serverName = "DESKTOP-882M394";
$connectionInfo = array("Database"=>"FFXIV", "UID"=>"ffxiv", "PWD"=>"catswebnet");
// CREATE CONNECTION
$conn = sqlsrv_connect($serverName, $connectionInfo);
// CHECK CONNECTION
if (!$conn) {
	die(print_r(sqlsrv_errors(), true));
}?>