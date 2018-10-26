<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" charset="utf-8" />
	<title>FFXIV Web Parser</title>
	<script src="jquery-3.3.1.min.js"></script>
	<link rel="shortcut icon" href="" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
	<?php include "dbcommands.php";?>
    <div id="header">
        <h1>Blaze's FFXIV Parser</h1>
    </div>
	<div id="page">
		<div id="dps">
			<div id="dps-tbl">
				<table class="tbl-parse">
					<tr>
						<th>NAME</th>
						<th>DPS</th>
						<th>CRIT %</th>
						<th>DH %</th>
						<th>DAM %</th>
                        <th>JOB</th>
					</tr>
                    <?php
					if($r2) {
						$hasRows2 = sqlsrv_has_rows($r2);
						if($hasRows2 === true) {
							while ($row = sqlsrv_fetch_array($r2, SQLSRV_FETCH_ASSOC)) {
								// TABLE ROW
								if ($row["name"] == "Limit") {
									echo "<tr class='LB'>";
								} else {
									echo "<tr class='" . $row["job"] . "'>";
								}
								// TABLE COLUMNS
								echo "<td>" . $row["name"] . "</td>";
								echo "<td>" . $row["encdps"] . "</td>";
								echo "<td>" . $row["critdamperc"] . "</td>";
								echo "<td>" . $row["directhitpct"] . "</td>";
								echo "<td>" . $row["damageperc"] . "</td>";
                                echo "<td>" . $row["job"] . "</td>";
								echo "</tr>";
							}
						}
					}
                    ?>
				</table>
			</div>
			<table id="tbl-foot">
                <tr>
                    <td>Time:</td>
                    <td class="footinfo">
                        <?php
						if($r1) {
							$hasRows1 = sqlsrv_has_rows($r1);
							if($hasRows1 === true) {
								$time = sqlsrv_fetch_array($r1, SQLSRV_FETCH_ASSOC);
								$duration = " " . $time["duration"];
								echo $duration;
							}
						}
                        ?>
                    </td>
                </tr>
				<tr>
					<td>Raid DPS:</td>
					<td class="footinfo">
                        <?php
						if($r3) {
							$hasRows3 = sqlsrv_has_rows($r3);
							if($hasRows3 === true) {
								$damage = sqlsrv_fetch_array($r3, SQLSRV_FETCH_ASSOC);
								$dps = " " . $damage["totaldps"];
								echo $dps;
							}
						}

                        sqlsrv_free_stmt($r1);
						sqlsrv_free_stmt($r2);
						sqlsrv_free_stmt($r3);
						sqlsrv_close($conn);
                        ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>