<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
 

<title>15 Minute Traffic Summary</title>

<script type="text/javascript" src="js/jquery-1.12.1.min.js" ></script>
<script type="text/javascript" src="js/highcharts.js" ></script>
<script type="text/javascript" src="js/themes/gray.js"></script>

<script type="text/javascript">
	var chart;
			$(document).ready(function() {
				var options = {
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: '15m Traffic',
						x: -20 //center
					},
					subtitle: {
						text: '',
						x: -20
					},
					xAxis: {
						type: 'datetime',
						tickInterval: 15 * 60 * 1000,
						labels: {
							align: 'center',
							x: -3,
							y: 20,
							formatter: function() {
								return Highcharts.dateFormat('%H:%M:%S', this.value);
							}
						}
					},
					yAxis: {
						title: {
							text: 'Bytes'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					//tooltip: {
					//	formatter: function() {
				         //       return Highcharts.dateFormat('%l%p', this.x-(1000*3600)) +'-'+ Highcharts.dateFormat('%l%p', this.x) +': <b>'+ this.y + '</b>';
					//	}
					//},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: 'Traffic'
					}]
				}
				// Load data asynchronously using jQuery. On success, add the data
				// to the options and initiate the chart.
				// This data is obtained by exporting a GA custom report to TSV.
				// http://api.jquery.com/jQuery.get/
				jQuery.get('data/summary-15m.php', null, function(tsv) {
					var lines = [];
					traffic = [];
					try {
						// split the data return into lines and parse them
						tsv = tsv.split(/\n/g);
						jQuery.each(tsv, function(i, line) {
							
							line = line.split(/\t/);
							console.log('Traffic: ' + line[0]);
							console.log('Raw Date: ' + line[1]);
							isodate = line[1].replace(' ', 'T');
							console.log('ISO Date: ' + isodate);
							hcdate = Date.parse(isodate);
							//date = Date.parse(line[1]*1000 + ' UTC');
							console.log('HC Date: ' + hcdate);
							traffic.push([
								hcdate, 
								parseInt(line[0].replace(',',''), 10)
							]);
						});
					} catch (e) {  }
					options.series[0].data = traffic;
					chart = new Highcharts.Chart(options);
				});
			});
</script>
</head>
<body>

<div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>
					
</body>
</html>
