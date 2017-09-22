<!DOCTYPE html>
<html>
<head>
	<title>Monthly budget'2</title>
	<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
</head>
<body>
	<div id='header'>
		<center><b>Monthly Budget</b></center>
	</div>

	<div id="bodi">
		<p><center><b>Your Budget Plans:</b></center></p>

		<hr>
		<div class="container">
	<!-- populates the page with the budget plans and when the image is click it redirects to 		another page to view the details of the budget plan -->	
	
<?php 

		foreach ($budget as $b) {
						
			echo   '<div class="inner-div">
					<center>
					<a href="'.base_url("index.php/detailController/viewDetails/".$b->budget_id).'">
					<img src="data:image/jpeg;base64,'.base64_encode($b->pic).'">
					<p><b>'.$b->budget_name.'</b><br> BUDGET: '.$b->amount_allocated.'</p></a>
					</center>
					</div>';
				}

							
?>
<!-- When this button is click it will re direct u to addBudget -->
					<div class="inner-div">
						<center>
						<a href="<?php echo base_url("index.php/sampleController/addBudget")?>">
						<span class="glyphicon glyphicon-plus"></span></a>
						<p><br>	Add new budget</p>
						</center>
					</div>


		</div>
	</div>
</body>
</html>