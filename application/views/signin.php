<!DOCTYPE html>
<html>
<head>
	<title>Signin Page</title>
</head>
<body>
<div class="container main_container">
	<div class="row">
		<div class="col-lg-4">
			<h3>Signin</h3>
			<form action="/main/login" method="post">
				<div class="form-group">
					<label for="email">Email Address:</label>
					<?php echo form_error('email'); ?>
					<input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<?php echo form_error('password'); ?>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password">
				</div>
				
				<button type="submit" class="btn btn-success float-right">Sign In</button>
			</form>			
		</div>
		<div class="col-lg-8"></div>
	</div>	
	<a href="register">Don't have an account? Register.</a>
</div>
</body>
</html>