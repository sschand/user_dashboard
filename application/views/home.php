<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
<div class="container main_container">
<?php echo $this->session->flashdata('errors'); ?>
	<div class="jumbotron">
		<h1>Welcome to the Test!</h1>
		<p>We're going to build a cool application using MVC framwork! This application was building was built with Bootstrap!</p>
		<a href="register" class="btn btn-primary btn-defaulyt" role="button">Start</a>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<h3>Manage Users</h3>
			<p>Using this application, you'll learn how to add, remove, and edit users for the application.</p>
		</div>
		<div class="col-lg-4">
			<h3>Manage Users</h3>
			<p>Using this application, you'll learn how to add, remove, and edit users for the application.</p>
		</div>
		<div class="col-lg-4">
			<h3>Manage Users</h3>
			<p>Using this application, you'll learn how to add, remove, and edit users for the application.</p>
		</div>
	</div>

</div>
</body>
</html>