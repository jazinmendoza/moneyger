	<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css'>
	<link rel='stylesheet' type="text/css" href='<?php echo base_url();?>css/sample.css'>
	<script type="text/javascript" src=<?php echo base_url("js/jquery-3.1.1.min.js"); ?>></script> 
	<div class="container-fluid back-container" >
		<img class="back-icon" src=<?php echo base_url("resources/arrow.svg"); ?> id="back">
	</div>
	<div class="container-fluid wrapper">
<?php
	foreach($pic as $x ){				
		echo '<div class="">
				<img class="icon" onclick= getId(this,'.$x->picId.') src="data:image/svg+xml;base64,'.base64_encode($x->pic).'">
			</div>';
	}
?>
	</div>
<script>

function getId(val,y) {
   window.location.href="<?php echo base_url("index.php/add_budget/"); ?>"+y;
   
}

$('#back').click(function(){
		window.location.href="<?php echo base_url("index.php/add_budget"); ?>";
	});
	

</script>