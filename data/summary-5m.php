<?php
header('Content-type: text/plain');
$con = mysql_connect("localhost","root","supersecretpassword");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("pmacct", $con);

$result = mysql_query("select avg(bytes), convert((min(timestamp_end) div 500)*500 +230, datetime) as timekey from acct_v9 group by timestamp_end div 500");

while($row = mysql_fetch_array($result)) {
  echo $row['avg(bytes)'] . "\t" . $row['timekey'] . "\n";
}

mysql_close($con);
?>
