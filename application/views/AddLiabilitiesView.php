<!DOCTYPE html>
<html>
<head>
	<title>Moneyger | Add Liability</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		.container {
			max-height: 1381px;
			max-width: 700px;
		}
		.header {
			background-color: #49c973;
			width: 1381px;
			height: 90px;
		}
		h3 {
			color: white;
            margin-left: 590px;
            margin-top: 28px;
		}
		h5 {
			margin-left: 565px;
			margin-top: 25px;
		}
		input {
			margin-left: 100px;
			width: 50%;
		}
		button {
			margin-left: 100px;
		}
		.input {
			width: 500px;
		}
		.btn {
			width: 500px;
			margin-top: 5px;
		}
	</style>
</head>
<body>
	<div class="containter">
		<div class="row header">
			<h3>ADD LIABILITY</h3>
		</div>
		<div class="row">
			<h5>ADDING A NEW LIABILITY</h5>
		</div>
		<div class="row">
			<form method="POST" autocomplete="off">
				<input type="hidden" name="userId" value="1" class="form-control"> <!---- ATE JAZIN! I SESSION LANG ANG VALUE HERE! :) ---->
				<div class="col-12">
					<input type="name" name="description" placeholder="Name" class="form-control">
				</div>
				<div class="col-12">
					<input type="name" name="amount" placeholder="Amount" class="form-control">
				</div>
				<div class="col-12">
					<input type="name" name="percentage" placeholder="Percentage" class="form-control">
				</div>
				<div>
					
					
				</div>
				<div class="col-12">
					<button class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
		
	</div>
</body>
</html>