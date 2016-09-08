<!DOCTYPE html>
<html>
<head>
	<title>New User</title>
</head>
<body>
<div class="container main_container">
	<div class="row">
		<div class="col-lg-11"><h2>Add a new user</h2></div>
		<div class="col-lg-1 add_new"><a href="/dashboard/admin" class="float-right add_new btn btn-primary" role="button">Return to Dashboard</a></div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<form action="/main/register_validate" method="post">
				<input type="hidden" name="register_type" value="admin">
				<div class="form-group">
					<label for="email">Email Address:</label>
					<?php echo form_error('email'); ?>
					<input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
				</div>
				<div class="form-group">
					<label for="first_name">First Name:</label>
					<?php echo form_error('first_name'); ?>
					<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
				</div>
				<div class="form-group">
					<label for="last_name">Last Name:</label>
					<?php echo form_error('last_name'); ?>
					<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<?php echo form_error('password'); ?>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="c_password">Password Confirmation:</label>
					<?php echo form_error('c_password'); ?>					
					<input type="password" class="form-control" name="c_password" id="c_password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-success float-right">Create</button>
			</form>			
		</div>
		<div class="col-lg-8"></div>
	</div>	
</div>
</body>
</html>