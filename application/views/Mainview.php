<?php
	$user_id = $_SESSION['user'];
?>
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
<div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-hidden="true">
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
			    	<img src="resources/IncomeIcon.png" width="10%">
			    <input type="input" class="" id="income-input" name="amount">
			  	</div>
			 </form>
			 <div class="form-group-btn form-group">
			 	<button class="btn btn-success edit-btn " id="submitIncome" data-dismiss="modal">Edit</button>
			 </div>
			 <p id="income-error"></p>
			
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
					<h5 class="total-text">Monthly Income</h5>
				</div>
				<div class="row total-number-container">
					<div class="col-2 icon-container">
							<img class="icon" src="resources/information.svg" alt="Info" id="income-info" tabindex="0" data-toggle="popover" data-trigger="focus" data-content="This shows the monthly income you have set."> 
					</div>	
					<div class="col-8 money-container">
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span id="total-income-number"></span>	
					</div>
					<div class="col-2 icon-container">
						<img class="icon" id="edit-icon" src="resources/pencil.svg" alt="Add Income" data-toggle="modal" data-target="#incomeModal">
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
							<img class="icon" src="resources/information.svg" alt="Info" tabindex="0" data-toggle="popover" data-trigger="focus" data-content="This shows the allocated monthly budget you have set.">
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
							<img class="icon" src="resources/information.svg" alt="Info" tabindex="0" data-toggle="popover" data-trigger="focus" data-content="This shows the total expense you have incurred for the month.">
						</a>
					</div>	
					<div class="col-8 money-container" >
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span  id="total-expense-number"></span>
					</div>
					<div class="col-2 icon-container">
						<a href="index.php/AddExpenseController/index?user=<?php echo $user_id; ?>">
							<img class="icon" id="add-expense" src="resources/plus.svg" alt="Add Expense">
						</a>
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
							<img class="icon" src="resources/information.svg" alt="Info" tabindex="0" data-toggle="popover" data-trigger="focus" data-content="This shows the total savings for this month (Total Income - Total Expense)."> 
						</a>
					</div>	
					<div class="col-8 money-container" >
						<img class="peso-icon" src="resources/philippine-peso.svg" alt="Php">
						<span id="total-savings-number"></span>
					</div>
					<div class="col-2 icon-container">
						
					</div>
				</div>
			</div>

		</div>
	</div>		

</body>
<script type="text/javascript">
	var user_id= "<?php echo  $user_id; ?>";
	// executes when the HTML file's (document object model: DOM) has loaded
	$(document).ready(function() {
	    $.ajax({
	    	//Posts user_id to HomeController
	    	type:'POST',
	    	data:{user_id: user_id},
	    	dataType: 'json',
	    	url: 'index.php/HomeController/showSummary',
	    	//if sucessfully redirected
	    	success: function(result){
	    		var total_income = parseFloat(result[0][0].total_income);
	    		var total_income = total_income.toFixed(2);
	    		//displays in #total-income-number
	    		$('#total-income-number').html(total_income);
	    		var total_budget = parseFloat(result[1][0].total_budget);
	    		var total_budget = total_budget.toFixed(2);
	    		//displays in #total-budget-number
	    		$('#total-budget-number').html(total_budget);
	    	}
	    });
	    $("[data-toggle=popover]").popover();
	});

	$('#submitIncome').click(function(){
		var incomeAmount = document.getElementById('income-input').value;
		var incomeAmountString = incomeAmount.toString();
		var amount_regex = /^\[0-9]+(\.[0-9][0-9])/;
		if(incomeAmountString.match(amount_regex)){
			alert("ok");
		}
		$.ajax({
	    	//Posts edited income to HomeController
	    	type:'POST',
	    	data:{income: incomeAmount, user_id: user_id},
	    	dataType: 'json',
	    	url: 'index.php/HomeController/editIncome',
	    	//if sucessfully redirected
	    	success: function(result){
	    		if(result){
	    			var total_income = parseFloat(document.getElementById('income-input').value);
	    			var total_income = total_income.toFixed(2);
	    			$('#total-income-number').html(total_income);
	    		}
	    	}
	    });
		
	});
	// $('#add-expense').click(function(){
	// 	window.location.href = "index.php/AddExpenseController/" + encodeURIComponent("<?php echo  $user_id; ?>");
	// });
</script>
</html>
