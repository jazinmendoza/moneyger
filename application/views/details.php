<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel='stylesheet' href='<?php echo base_url();?>css/boostrap/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<div id="wholecontent">
		<form method="post" action="<?php echo base_url() . "index.php/sampleController/update_budget/"?>">
			<center>
			<div class = "con">
			<div id "spec-icon"><?php echo '<span class="glyphicon glyphicon-'.$icon.'"></span>';?></div>
			<input type="text" id="hide" name="did" value="<?php echo $budget_id; ?>">
			<input type="text" class="form-control" name="budgetamt" id="budgetamt" value="<?php echo $amount_allocated;?>" required="required"><br>
			<input type="text" class="form-control" name="note" id="note" placeholder="Note" value="<?php echo $note;?>" >
			<input type="submit" id="submit" name="dsubmit" value="Update">
			</div>
		</center>
		</form>
			<a href="<?php echo base_url("index.php/sampleController/delete_specific_budget/".$budget_id."")?>"><button type="submit" class="btn btn-danger button" id="delete">DELETE</button></a>
	</div>


	
</body>
<!--
	<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type:'GET',
			dataType:'json',
			url:'index.php/detailController/getBudgetDetails',
			success: function(result){
				console.log(result);
			}
		});
	});
	</script>-->
</html>