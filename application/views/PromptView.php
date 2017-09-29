<html>
<head>
	<title>Moneyger | Prompt</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/external/PromptView2.css">
</head>
<body>
<div class="container">
	<!-- LOGO -->
	<div class="row">
		<div class="col-12">
			<img src="../../../resources/LoginLogov2.png" style="width:100%">
		</div>
	</div>

	<!-- CONTENT -->
	<div class="row">
		<div class="col-10 offset-1">
			<form method="post">
				<?php
					$attributes = array("name" => "signupform");
					echo form_open("PromptController/index", $attributes);
				?>
				<div class="form-group">
					<label for="income">How much do you make monthly?</label>
					<input type="text" id="income" placeholder="income" class="form-control" name="income" value="<?php echo set_value('income')?>">
					<span class="text-danger"><?php echo form_error('income')?></span>
				</div>
				<div class="form-group">
					<label for="budget">How much is your monthly main budget?</label>
					<input type="text" id="budget" placeholder="budget" class="form-control" name="budget" value="<?php echo set_value('budget')?>">
					<span class="text-danger"><?php echo form_error('budget')?></span>
				</div>
				<div class="form-group">
					<center>
						<button class="btn btn-success" type="submit">Submit</button>
					</center>
				</div>
			</form>
			<?php
				echo form_close();
				echo $this->session->flashdata('msg');
			?>
		</div>
	</div>
</div>
</body>
</html>
