<?php
header('Content-type: text/plain');
$con = mysql_connect("localhost","root","supersecretpassword");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("pmacct", $con);

$result = mysql_query("SELECT port_dst,SUM(bytes) FROM acct_v9 GROUP BY port_dst ORDER BY SUM(bytes) DESC LIMIT 25");

$rows = array();
while ($r = mysql_fetch_array($result)) {
	$row[0] = $r[0];
	$row[1] = $r[1];
	array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);
//show top talkers chart
//while($row = mysql_fetch_array($result)) {
//echo $row['ip_src'] . "\t" . $row['SUM(bytes)'] . "\n";
//}

mysql_close($con);
?>
