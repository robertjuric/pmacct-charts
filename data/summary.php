<?php
header('Content-type: text/plain');
$con = mysql_connect("localhost","root","supersecretpassword");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("pmacct", $con);

//by minute, no rounding
$result = mysql_query("select sum(bytes), timestamp_end from acct_v9 group by HOUR(timestamp_end),MINUTE(timestamp_end)");

//$result = mysql_query("select sum(bytes),timestamp_end from acct_v9 group by unix_timestamp(timestamp_end) DIV 60");

//$result = mysql_query("SELECT * FROM acct_v9");

while($row = mysql_fetch_array($result)) {
  echo $row['sum(bytes)'] . "\t" . $row['timestamp_end'] . "\n";
}

mysql_close($con);
?>
