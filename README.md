pmacct-charts  
  
Collection of Highcharts files for use with pmacct, and specifically nfacctd when not using temporal aggregation.  
  
/pmacct-setup/  
Includes the mysql script to setup a v9 table with the additional timestamp primitives for an actual traffic loggin setup. Also includes a nfacctd-debug.conf file for capture to a MySQL database and showing debug output.  
  
data.php
A Highcharts data file selecting most relevant info from the flow table. Not really used now except for testing.  
  
/top-talkers/  
Includes a data file and chart presentation file which shows a summary of bytes by source IP in a pie chart setup. Currently my only working chart.  