
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
	<!-- populates the page with the budget plans and when the image is click it redirects to another page to view the details of the budget plan -->	
	
<?php 
		foreach ($budget as $b) {	
			echo "<div class='container budget'>
					<div class='icon-container'>
					    <a href='".base_url("index.php/details/".$b->budget_id."")."'>
							<img class='icon' src='data:image/svg+xml;base64,".base64_encode($b->pic)."'/>
						</a>
					</div>	
					<div class='icon-name'>
						".$b->budget_name."
					</div>
					<div class='amount'>
						 &#8369 ".$subtotal =  number_format($b->amount_allocated, 2, '.', ',')."
					</div>
				  </div>";
		}

							
?>
<!-- When this button is click it will re direct u to addBudget -->
				<div class='container budget'>
					<div class='icon-container'>
					    <a href=<?php echo base_url("index.php/add_budget"); ?> >
							<img class='icon' src='<?php echo base_url('resources/plus.svg'); ?>'/>
						</a>
					</div>	
					<div class='icon-name'>
					Add budget
					</div>
				</div>


		</div>
	</div>
</body>
<script type="text/javascript">
	$('#menu').click(function(){
		window.location.href = "<?php echo base_url('index.php/menu'); ?>";
	});
</script>
</html>