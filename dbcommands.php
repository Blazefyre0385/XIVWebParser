<?php
include_once "dbconnect.php";
//QUERIES
$q1 = "SELECT RIGHT('0' + CAST((duration / 60) % 60 AS VARCHAR), 2) + ':' + RIGHT('0' + CAST(duration % 60 AS VARCHAR), 2) AS duration FROM current_table WHERE damage > 0";
$r1 = sqlsrv_query($conn, $q1);

$q2 = "SELECT * FROM vw_FFXIV_Parse ORDER BY encdpsnum DESC";
$r2 = sqlsrv_query($conn, $q2);

$q3 = "SELECT FORMAT(SUM(encdps), 'N0') AS totaldps FROM current_table WHERE damage > 0 AND ally='T'";
$r3 = sqlsrv_query($conn, $q3);
?>