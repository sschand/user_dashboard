<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<!-- <link rel="stylesheet" type="text/css" href="/assets/css/user_dashboard.css"> -->
</head>
<body>
	<div class="container main_container">
		<h3>Edit Profile</h3>
		<?php echo $this->session->flashdata('success') ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="edit_info">
					<h4 id="info">Edit Information</h4>
					<form action="/users/save_profile" method="post">
						<div class="form-group">
							<label for="email">Email Address:</label>
							<?php echo form_error('email'); ?>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $user['email'] ?>">
						</div>
						<div class="form-group">
							<label for="first_name">First Name:</label>
							<?php echo form_error('first_name'); ?>
							<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $user['first_name'] ?>">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name:</label>
							<?php echo form_error('last_name'); ?>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $user['last_name'] ?>">
						</div>
						<button type="submit" class="btn btn-success float-right">Save</button>
					</form>			
				</div>
			</div>
			<div class="col-lg-6">
				<div class="edit_info">
					<h4 id="change_password">Change Password</h4>
					<form action="/users/save_password" method="post">
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="c_password">Password Confirmation:</label>
							<input type="password" class="form-control" id="c_password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-success float-right">Update Password</button>
					</form>			
				</div>
			</div>
		</div>	
		<div class="row col-lg-12">
			<div class="edit_description">
				<h4 id="description">Edit Description</h4>
				<form action="/users/save_description" method="post">
					<div class="form-group">
						<textarea name="description"><?php echo $user['description'] ?></textarea>
						</div>	
					<button type="submit" class="btn btn-success float-right">Save</button>
				</form>			
			</div>
		</div>
	</div>
</body>
</html>