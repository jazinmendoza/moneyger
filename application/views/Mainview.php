
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main View</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/mainview.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script> 
	<script type="text/javascript" src="js/jquery-ui.min.js"></script> 
	<script type="text/javascript" src="js/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>  
	<script type="text/javascript" src="js/angular.min.js"></script>

</head>
<body>
<p></p>
	<!-- Modal -->
<div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="close-container">
    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
     		<span aria-hidden="true">&times;</span>
     	</button>
    </div>

      <div class="modal-body">
            <form >
			  <div class="form-group">
			    <label for="input1">Add Income Logo</label>
			    <input type="input" class="" id="input1" placeholder="0.00" name="amount">
			  </div>
			  <div class="form-check">
			    <label class="form-check-label">
			      <input type="checkbox" class="form-check-input">
			      Add to monthy income from now on
			    </label>
			  </div>
			  <div>
			  	<label class="form-check-label">
			      <input type="checkbox" class="form-check-input">
			      Just this month
			    </label>
			  </div>
  			<button id="submitIncome">Submit</button>
		</form>
      </div>
      
    </div>
  </div>
</div>
	<div class="container-fluid" id="main-container">
		<div class="container-fluid" id="header">
			<img src="resources/mainview.png" id="logo">
		</div>
		<div class="container-fluid summary-container-all">

			<div class="container-fluid summary-container" id="total-income">
				<div class="container total-text-container row " id="total-income-text">
					<h5 class="total-text">Total Income</h5>
				</div>
				<div class="row total-number-container">
					<div class="col-2 icon-container">
						<a href="#">
							<img class="icon" src="resources/info.svg" alt="Info">
						</a>
					</div>	
					<div class="col-8 money-container">
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span id="total-income-number"></span>	
					</div>
					<div class="col-2 icon-container">
						<img class="icon" src="resources/plus.svg" alt="Add Income" data-toggle="modal" data-target="#incomeModal">
					</div>
				</div>
			</div>

			<div class="container-fluid summary-container" id="total-budget">
				<div class="container total-text-container row " id="total-budget-text">
					<h5 class="total-text">Total Budget</h5>
				</div>
				<div class="row total-number-container">
					<div class="col-2 icon-container">
						<a href="#">
							<img class="icon" src="resources/info.svg" alt="Info">
						</a>
					</div>	
					<div class="col-8 money-container">
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span  id="total-budget-number"></span>
					</div>
					<div class="col-2 icon-container">
						<img class="icon" src="resources/plus.svg" alt="Add Budget" data-toggle="modal" data-target="#">
					</div>
				</div>
			</div>

			<div class="container-fluid summary-container" id="total-savings">
				<div class="container total-text-container row " id="total-expense-text">
					<h5 class="total-text">Total Expense</h5>
				</div>
				<div class="row total-number-container">
					<div class="col-2 icon-container">
						<a href="#">
							<img class="icon" src="resources/info.svg" alt="Info">
						</a>
					</div>	
					<div class="col-8 money-container" >
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span  id="total-expense-number"></span>
					</div>
					<div class="col-2 icon-container">
						<img class="icon" src="resources/plus.svg" alt="Add Expense" data-toggle="modal" data-target="#">
					</div>
				</div>
			</div>

			<div class="container-fluid summary-container" id="total-savings">
				<div class="container total-text-container row " id="total-savings-text">
					<h5 class="total-text">Total Savings</h5>
				</div>
				<div class="row total-number-container">
					<div class="col-2 icon-container">
						<a href="#">
							<img class="icon" src="resources/info.svg" alt="Info"> 
						</a>
					</div>	
					<div class="col-8 money-container" >
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span id="total-savings-number"></span>
					</div>
					<div class="col-2 icon-container">
						<img class="icon" src="resources/plus.svg" alt="Add Savings" data-toggle="modal" data-target="#">
					</div>
				</div>
			</div>

		</div>
	</div>		

</body>
<script type="text/javascript">
	var user_id= "<?php echo $_SESSION['user']; ?>";
	// executeas when the HTML file's (document object model: DOM) has loaded
	$(document).ready(function() {
	    $.ajax({
	    	//Posts user_id to HomeController
	    	type:'POST',
	    	data:{user_id: user_id},
	    	dataType: 'json',
	    	url: 'index.php/HomeController/showSummary',
	    	//if sucessfully redirected
	    	success: function(result){
	    		var total_income = parseFloat(result[1][0].total_income);
	    		var total_income = total_income.toFixed(2);
	    		//displays in #total-income-number
	    		$('#total-income-number').html(result[0][0].total_income);
	    		var total_budget = parseFloat(result[1][0].total_budget);
	    		var total_budget = total_budget.toFixed(2);
	    		//displays in #total-budget-number
	    		$('#total-budget-number').html(total_budget);
	    	}
	    });
	});
</script>
</html>
