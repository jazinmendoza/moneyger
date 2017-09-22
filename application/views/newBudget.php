<!DOCTYPE html>
<html>
<head>
	<title>ADD NEW BUDGET</title>
	<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
</head>
<body>
	<div class="container" id="bode">
		<div class="col-md-4 col-md-offset-4">
		<br><br><br>
		    <center><p><b>ADDING A NEW BUDGET</b> </p></center>
			
<!--Allows you to input a new budget to be add in the database-->	
		<div class="row">	
			
				
				<?php 
				foreach($pic as $x ){				
				echo '<span id="span1"><img id="img1" class="loveimg"  onclick="getId(this,'.$x->picId.')" src="data:image/jpeg;base64,'.base64_encode($x->pic).'"></span>';

			}
				
				echo form_open('newBudgetController/insertBudget');

				echo form_label('','picId');
				$data = array(	
						'name'=>'picId',
						'class' => 'form-control',
						'id' => 'txtbox1',
						'type'=>'hidden', 	
						'required' => 'required'
						);
				echo form_input($data);
				echo '<br>';

				echo form_label('Budget Name:','budget_name');
				$data = array(	
						'name'=>'budget_name',
						'class' => 'form-control',
						'id' => 'txtbox',
						'required' => 'required'
						);
				echo form_input($data);
				echo '<br>';

				echo form_label('Budget:','amount_allocated');
				$data = array(
						'name'=>'amount_allocated',
						'class' => 'form-control',
						'id' => 'txtbox',
						'required' => 'required'
						)	;
				echo form_input($data);


				$data = array(
						'type'=>'submit',
						'class' => 'btn btn-success',
						'id' => 'submitB',
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
function getId(val,y) {
    

   var x = document.getElementsByClassName('loveimg');
   for(i = 0 ; i < x.length; i++){
   		x[i].style.border='none';    
   }
   val.style.border='1px solid #2ECC71';  
   	
    document.getElementById("txtbox1").value = y;
   
}
	

</script>