<!DOCTYPE html>
<html>
<head>
	<title>ADD SPECIAL EXPENSE</title>
	<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
	 <link rel="stylesheet" type="text/css" href='<?php echo base_url();?>css/datatables.min.css'>
</head>
<body>
	<div class="container" id="bode2">
		<div class="col-md-4 col-md-offset-4">
		<br><br><br>
		    <center><p><b>WHAT DO YOU WANT TO SAVE UP FOR?</b> </p></center>
			
<!--Allows you to input a new budget to be add in the database-->	
		<div class="row">	
				<?php 
				
				echo form_open('formExpenseController/insertSpecBudget');

				echo form_label('Budget Name:','savings_name');
				$data = array(	
						'name'=>'savings_name',
						'class' => 'form-control',
						'id' => 'txtbox2',
						'required' => 'required',
						'placeholder' => 'Description'
						);
				echo form_input($data);
				echo '<br>';

				echo form_label('Budget:','amount_saved');
				$data = array(
						'name'=>'amount_saved',
						'class' => 'form-control',
						'id' => 'txtbox2',
						'required' => 'required'
						)	;
				echo form_input($data);
				echo '<br>';

				$data = array(
						'type'=>'submit',
						'class' => 'btn btn-success',
						'id' => 'submitt',
						'value' => 'Submit'
						);
				echo "<br>";
				echo form_submit($data);


				// 	BUDGET NAME<br>
				// 	<input type="text" class="form-control" name="budget_name"  required="required"><br>
				// 	BUDGET ALLOCATED<br>
				// 	<input type="text" class="form-control" name="amount_allocated"   required="required"><br>

				// 	<center><button type="submit" class="btn button ">ADD NEW BUDGET :D</button></center>
				// </form>
				?>
			</div>	
		</div>
	</div>
</body>
</html>
<script>
	

</script>