#pmacct-charts  
  
Collection of Highcharts files for use with pmacct, and specifically nfacctd when not using temporal aggregation (using proper flow timestamps).  
  
###pmacct-setup/  
Includes the mysql script to setup a v9 table with the additional timestamp primitives for an actual traffic loggin setup. Also includes a nfacctd-debug.conf file for capture to a MySQL database and showing debug output.  
  
###data/  
A directory containing the MySQL queries and data for the charts. If you want to troubleshoot and experiment verify the data is represented correctly on these pages.  
  
###Summary-Traffic  
The summary-traffic-xx charts represent an aggregation of traffic (SUM of BYTES) over a period of time.  
  
###Top-Talkers
Currently displays the top 10 source IP addresses based on (SUM of BYTES). To modify the count you can adjust the LIMIT in the MySQL query in the data folder.  
  
###Top-Ports  
Currently displays the top 25 destination ports based on (SUM of BYTES). To modify this count you can adjust the LIMIT in the MySQL query in the data folder.