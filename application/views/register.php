<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<div class="container main_container">
	<div class="row">
		<div class="col-lg-4">
			<h3>Register</h3>

			<form action="/main/register_validate" method="post">
				<div class="form-group">
					<label for="email">Email Address:</label>
					<?php echo form_error('email'); ?>
					<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
				</div>
				<div class="form-group">
					<label for="first_name">First Name:</label>
					<?php echo form_error('first_name'); ?>
					<input type="text" class="form-control" id="first_name" name="first_name"  placeholder="First Name">
				</div>
				<div class="form-group">
					<label for="last_name">Last Name:</label>
					<?php echo form_error('last_name'); ?>
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<?php echo form_error('password'); ?>
					<input type="password" class="form-control" id="password" name="password"  placeholder="Password">
				</div>
				<div class="form-group">
					<label for="c_password">Password Confirmation:</label>
					<?php echo form_error('c_password'); ?>
					<input type="password" class="form-control" id="c_password" name="c_password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-success float-right">Register</button>
			</form>			
		</div>
		<div class="col-lg-8"></div>
	</div>	
	<a href="signin">Already have an account? Login</a>
</div>
</body>
</html>