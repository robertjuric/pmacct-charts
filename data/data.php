<?php
header('Content-type: text/plain');
$con = mysql_connect("localhost","root","supersecretpassword");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("pmacct", $con);

$result = mysql_query("SELECT * FROM acct_v9");

while($row = mysql_fetch_array($result)) {
  echo $row['ip_src'] . "\t" . $row['ip_dst'] . "\t" . $row['port_src'] . "\t" . $row['port_dst'] . "\t" . $row['bytes'] . "\t" . $row['timestamp_end'] . "\n";
}

mysql_close($con);
?>
