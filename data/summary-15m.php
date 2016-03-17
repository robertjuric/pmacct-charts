<?php
header('Content-type: text/plain');
$con = mysql_connect("localhost","root","supersecretpassword");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("pmacct", $con);
// This query counts all the traffic combined over a 15 minute period
$result = mysql_query("SELECT SUM(bytes),FROM_UNIXTIME(ROUND(UNIX_TIMESTAMP(timestamp_end)/(15*60))*(15*60),'%Y-%m-%d %H:%i:%s') AS timekey FROM acct_v9 GROUP BY timekey");

while($row = mysql_fetch_array($result)) {
  echo $row['SUM(bytes)'] . "\t" . $row['timekey'] . "\n";
}

mysql_close($con);
?>
