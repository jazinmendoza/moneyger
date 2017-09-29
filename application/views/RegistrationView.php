<html>
<head>
	<title>Moneyger | Registration</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/external/RegistrationView.css">
</head>
<body>
<div class="container">
	<!-- LOGO -->
	<div class="row">
		<div class="col-12">
			<img src="resources/LoginLogov2.png" style="width:100%">
		</div>
	</div>

	<!-- CONTENT -->
	<div class="row">
		<div class="col-10 offset-1 well">
			<form method="post">
				<?php
					$attributes = array("name" => "registrationForm");
					echo form_open("RegistrationController/index", $attributes);
				?>
				<div class="form-group">
					<label for="firstName">First Name</label>
					<input type="text" name="firstName" placeholder="first name" class="form-control" value="<?php echo set_value('firstName')?>">
					<span class="text-danger"><?php echo form_error('firstName')?></span>
				</div>
				<div class="form-group">
					<label for="middleName">Middle Name</label>
					<input type="text" name="middleName" placeholder="middle name" class="form-control" value="<?php echo set_value('middleName')?>">
					<span class="text-danger"><?php echo form_error('middleName')?></span>
				</div>
				<div class="form-group">
					<label for="lastName">Last Name</label>
					<input type="text" name="lastName" placeholder="last name" class="form-control" value="<?php echo set_value('lastName')?>">
					<span class="text-danger"><?php echo form_error('lastName')?></span>
				</div>
				<div class="form-group">
					<label for="suffix">Suffix</label>
					<input type="text" name="suffix" placeholder="suffix" class="form-control" value="<?php echo set_value('suffix')?>">
					<span class="text-danger"><?php echo form_error('suffix')?></span>
				</div>
				<div class="form-group">
					<label for="emailAddress">Email Address</label>
					<input type="email" name="email" placeholder="email" class="form-control" value="<?php echo set_value('email')?>">
					<span class="text-danger"><?php echo form_error('email')?></span>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="password" class="form-control" value="<?php echo set_value('password')?>">
					<span class="text-danger"><?php echo form_error('password')?></span>
				</div>
				<div class="form-group">
					<label for="password">Retype Password</label>
					<input type="password" name="re-password" placeholder="retype password" class="form-control" value="<?php echo set_value('re-password')?>">
					<span class="text-danger"><?php echo form_error('re-password')?></span>
				</div>
				<div class="form-group">
					<label for="currency">Currency</label>
					<br>
					<center>
						<select name="currency">
							<option value="1">Philippines (PHP)</option>
							<option value="2">United States of America (USD)</option>
						</select>
					</center>
				</div>
				<div class="form-group">
					<center>
						<button class="btn btn-success" type="submit">Sign Up</button>
					</center>
				</div>
				<?php
					echo form_close();
					echo $this->session->flashdata('msg');
				?>
			</form>
		</div>
	</div>
	<br>
	<!-- Login Option -->
	<div class="row">
		<div class="col-8 offset-2 text-center login-check">
			Already Registered? <a href="<?php echo base_url(); ?>/index.php/LoginController/index">Login Here</a>
		</div>
		<br><br><br>
	</div>
</div>
</body>
</html>
