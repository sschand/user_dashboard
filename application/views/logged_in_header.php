<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/user_dashboard.css">

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">Test App</a>
		</div>
		<p class="navbar-text"><a href="<?php echo ($this->session->userdata('level') == 9) ? '/dashboard/admin' : '/dashboard' ?>" class="navbar-link">Dashboard</a></p>		
		<p class="navbar-text"><a href="/users/edit" class="navbar-link">Profile</a></p>
		<p class="navbar-text navbar-right"><a href="/main/logoff" class="navbar-link">Log off</a></p>
	</nav>	
</body>
</html>