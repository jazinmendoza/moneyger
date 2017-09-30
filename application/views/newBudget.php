<!DOCTYPE html>
<html>
<head>
	<title>ADD NEW BUDGET</title>
	<script type="text/javascript" src=<?php echo base_url("js/jquery-3.1.1.min.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("js/umd/popper.min.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("js/bootstrap.min.js")?>></script>  

	<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
	
</head>
<body>

	<div class="container-fluid back-container" >
		<img class="back-icon" src=<?php echo base_url("resources/arrow.svg"); ?> id="back">
	</div>
	<div class="container" id="bode">
		    <center><p><b>ADDING A NEW BUDGET</b> </p></center>
			
<!--Allows you to input a new budget to be add in the database-->	
		<div class="form-div"  id="budget-form-div">
			<?php 
				echo form_open('newBudgetController/insertBudget/'.$this->uri->segment(2,0));

				// echo form_label('','picId');
				// $data = array(	
				// 		'name'=>'picId',
				// 		'class' => 'form-control',
				// 		'id' => 'txtbox1',
				// 		'type'=>'hidden', 	
				// 		'required' => 'required'
				// 		);
				// echo form_input($data);
				// echo '<br>';

					echo '<div class="icon-container" id="add-icon-div">';
						echo '<img class="icon" id="add-icon">';
					echo '</div>';
				?>

				<div id="error"></div>

				<?php
				$icon_id = $this->uri->segment(2,0);

				echo form_label('Budget Name:','budget_name');
				$data = array(	
						'name'=>'budget_name',
						'class' => 'form-control',
						'id' => $icon_id,
						'required' => 'required',
						);
				echo form_input($data);
				echo '<br>';

				echo form_label('Amount:','amount_allocated');
				$data = array(
						'name'=>'amount_allocated',
						'class' => 'form-control',
						'id' => 'txtbox_amount',
						'required' => 'required'
						)	;
				echo form_input($data);

				$data = array(
						'type'=>'submit',
						'class' => 'btn btn-success',
						'id' => 'submitB',
						'value' => 'Submit'
						);
				echo "<center> <br>";
				echo form_submit($data);
				echo "</center>";
				// 	BUDGET NAME<br>
				// 	<input type="text" class="form-control" name="budget_name"  required="required"><br>
				// 	BUDGET ALLOCATED<br>
				// 	<input type="text" class="form-control" name="amount_allocated"   required="required"><br>

				// 	<center><button type="submit" class="btn button ">ADD NEW BUDGET :D</button></center>
				// </form>
			?>
		</div>	
	</div>

</body>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalLabel">Oops!</h5>
          	<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
    	<div class="modal-body">
        It seems that you're budget exceeds your total income. We suggest decreasing your budget allocations or increasing your income.
    	</div>
    	<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
    	</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var retval = <?php echo $this->uri->segment(2,0); ?>;
		if(retval<=0){
			document.getElementById("add-icon").src = "<?php echo base_url('resources/plus-gray.svg'); ?>";
			if(retval==-1){
				$('#error').html ("Enter a valid amount.");
			}else if(retval==-2){
				$('#error').html ("Choose an icon.");
			}else if(retval==-3){
   				$('#errorModal').modal('show');
			}
		}else{
			$.ajax({
	    		//Posts edited income to HomeController
	    		type:'POST',
	    		data:{pic_id: <?php echo $this->uri->segment(2,0); ?>},
	    		dataType: 'json',
	    		url: '<?php echo base_url('index.php/newBudgetController/getIcon'); ?>',
	    		//if sucessfully redirected
	    		success: function(result){
	    			var encoded_pic = btoa(result[0].pic); 
	    			document.getElementById("add-icon").src = "data:image/svg+xml;base64,"+encoded_pic;
	    		}
	    	});
		}
	});
	$('#add-icon').click(function(){
		window.location.href = "<?php echo base_url('index.php/add_icon'); ?>";
	});

	$('#back').click(function(){
		window.location.href="<?php echo base_url("index.php/monthly_budget"); ?>";
	});
</script>
</html>
