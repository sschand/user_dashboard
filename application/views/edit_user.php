<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<!-- <link rel="stylesheet" type="text/css" href="/assets/css/user_dashboard.css"> -->
</head>
<body>
	<div class="container main_container">
		<h3>Edit user #<?php echo $user['id'] ?> <a href="/dashboard/admin"><button type="button" class="btn btn-primary float-right">Return to Dashboard</button></a></h3>

		<?php echo $this->session->flashdata('success') ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="edit_info">
					<h4 id="info">Edit Information</h4>
					<form action="/users/admin_save_profile" method="post">
						<input type="hidden" name="id" value="<?php echo $user['id'] ?>">
						<div class="form-group">
							<label for="email">Email Address:</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $user['email'] ?>">
						</div>
						<div class="form-group">
							<label for="first_name">First Name:</label>
							<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $user['first_name'] ?>">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name:</label>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $user['last_name'] ?>">
						</div>
						<div class="form-group">
							<label for="user_level">User Level:</label>
							<select class="form-control" name="level">
								<option <?php if ($user['level'] == 1 ) echo 'selected' ; ?> value="1">Normal</option>
								<option <?php if ($user['level'] == 9 ) echo 'selected' ; ?> value="9">Admin</option>							
							</select>
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
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="c_password">Password Confirmation:</label>
							<input type="password" class="form-control" name="c_password" id="c_password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-success float-right">Update Password</button>
					</form>			
				</div>
			</div>
		</div>	
	</div>
</body>
</html>