<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<div id="wholecontent">
		<form method="post" action="<?php echo base_url('index.php/update_budget/'.$details[0]->budget_id); ?>">
			<center>
			<div class = "con">
				<div class="icon-container" id="detail-icon">
					<?php
					echo "<img class='icon' src='data:image/svg+xml;base64,".base64_encode($details[0]->pic)."'/>";
					?>
				</div>
			<div id="error"></div>
			<div > <?php echo $details[0]->budget_name; ?></div>
 			<input type="text" id="hide" name="did" value="<?php echo $details[0]->budget_id; ?>">
			<input type="text" class="form-control" name="budgetamt" id="budgetamt" value="<?php echo $details[0]->amount_allocated;?>" required="required"><br>
			<!-- <input type="text" class="form-control" name="note" id="note" placeholder="Note" value="<?php echo $note;?>" > -->
			<input class="btn btn-primary" type="submit" id="submit" name="dsubmit" value="Update">
			</div>
		</center>
		</form>
			<a href="<?php echo base_url('index.php/delete_budget/'.$details[0]->budget_id); ?>"><button type="submit" class="btn btn-danger button" id="delete">Delete</button></a>
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
		var retval = <?php echo $this->uri->segment(3,0); ?>;
		if(retval<0){
			if(retval==-1){
				$('#error').html ("Enter a valid amount.");
			}else if(retval==-3){
   				$('#errorModal').modal('show');
			}
		}
	});
	$('#back').click(function(){
		window.location.href="<?php echo base_url("index.php/monthly_budget"); ?>";
	});
</script>
</html>