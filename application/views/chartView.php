<!DOCTYPE html>
<html>
<head>
	<title>budget Charts</title>
</head>
<body>
	<div>
		<div id ='budget'></div>

	</div>
</body>
</html>	
<script src='<?php echo base_url();?>code/highcharts.js'></script>
<script>
var	first_chart = Highcharts.chart ('budget',{

	title:{ text: "GWA"},
	chart:{type:"column"},
	xAxis :[{ categories:["2nd"]}],

	series:[
			<?php
			foreach($budget as $ba){
		

			 		echo "{data:[".$ba->amount_allocated.  "], name: '"  .$ba->budget_name. "'}";
			
			 		echo ",";
			 		}
			 	

			 ?>

		
	],
			
	subtitle:{ text: "February 27,2017" }

});
</script>