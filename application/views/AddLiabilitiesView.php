<!DOCTYPE html>
<html>
<head>
	<title>Moneyger | Add Liability</title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
	<style>
		.container {
			max-height: 1381px;
			max-width: 600px;
		}
		.header {
			background-color: #49c973;
			width: 1381px;
			height: 90px;
		}
		h3 {
			color: white;
            margin-left: 600px;
            margin-top: 28px;
		}
		h5 {
			margin-left: 565px;
			margin-top: 25px;
		}
		.error {
			color: red;
			margin-left: 356px;
		}
		input {
			margin-top: 2px;
			margin-left: 30px;
		}
		button {
			background-color: #49c973;
			margin-left: 610px;
			margin-top: 10px;
		}
		.form {
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="containter">
		<div class="row header">
			<h3>ADD LIABILITY</h3>
		</div>
		<div class="col-10 form">
			<?php
				if(!$error) {
					echo '<span class="error">Cannot insert or Values are less than 0</span>';
				}
			?>
			<form method="POST" autocomplete="off">
				<input type="hidden" name="userId" value="1" class="form-control"> <!---- ATE JAZIN! I SESSION LANG ANG VALUE HERE! :) ---->
				<div class="col-12">
					<input type="name" name="description" placeholder="Device" class="form-control" required="required">
				</div>
				<div class="col-12">
					<input type="name" name="amount" placeholder="Amount" class="form-control" required="required">
				</div>
				<div class="col-12">
					<input type="name" name="percentage" placeholder="Percentage" class="form-control" required="required">
				</div>
				<div class="col-12">
					<input type="name" name="months" placeholder="Months" class="form-control" required="required">
				</div>
				<div class="col-12">
					<button class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
		
	</div>
</body>
</html>