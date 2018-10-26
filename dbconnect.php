<?php $serverName = "[YOUR COMPUTER NAME]";
$connectionInfo = array("DATABASE"=>"FFXIV", "UID"=>"userid", "PWD"=>"password");
// CREATE CONNECTION
$conn = sqlsrv_connect($serverName, $connectionInfo);
// CHECK CONNECTION
if (!$conn) {
	die(print_r(sqlsrv_errors(), true));
}?>
