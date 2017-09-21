<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/addexpense.css">
	<script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script> 
<!-- 	<script type="text/javascript" src="js/jquery-ui.min.js"></script> 
	<script type="text/javascript" src="js/bootstrap.min.js"></script>   -->
</head>
<body>
	<div class="container-fluid back-container">
		<img class="back-icon" src="../../resources/arrow.svg" id="back">
	</div>
	<div class="container-fluid budget-container">
	<?php
		foreach ($list as $budget) {
			echo "<div class='container budget'>
					<div class='icon-container'>
						<img class='icon' src='data:image/jpeg;base64,".base64_encode($budget->icon_image)."'/>
					</div>	
					<div class='icon-name'>
						".$budget->budget_name."
					</div>
					<div class='amount'>
						 &#8369 ".$budget->amount_allocated."
					</div>
				  </div>";
		}
	?>
	</div>
</body>
<script type="text/javascript">
	$('#back').click(function(){
		window.location.href = "index.php/Mainview/"
	});
</script>
</html>