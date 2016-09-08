<!DOCTYPE html>
<html>
<head>
	<title>User Information</title>
</head>
<body>
<div class="main_container container">

	<div>
		<h3><?php echo $user_info[0]['user_name'] ?></h3>
		<div class="row">
			<div class="col-lg-2">Registered at:</div>
			<div class="col-lg-10"><?php echo $user_info[0]['registered_date'] ?></div>
		</div>
		<div class="row">
			<div class="col-lg-2">User ID:</div>
			<div class="col-lg-10">#<?php echo $user_info[0]['user_id'] ?></div>
		</div>
		<div class="row">
			<div class="col-lg-2">Email address:</div>
			<div class="col-lg-10"><?php echo $user_info[0]['email'] ?></div>
		</div>
		<div class="row">
			<div class="col-lg-2">Description:</div>
			<div class="col-lg-10"><?php echo $user_info[0]['description'] ?></div>
		</div>
	</div>

	<div>
		<h3>Leave a message for <?php echo $user_info[0]['first_name'] ?></h3>
		<form action="/users/add_message" method="post">
			<div class="form-group">
				<input type="hidden" name="for_user" value="<?php echo $user_info[0]['user_id'] ?>">
				<input type="hidden" name="user_by" value="<?php echo $this->session->userdata('user_id') ?>">
				<textarea name="message" class="message_box"></textarea>
			</div>
			<button type="submit" class="btn btn-success float-right">Post</button>
		</form>
	</div>

	<!-- Previous Messages -->
	<div class="messages">
		<div class="message">
			<h4>Mark Guillen wrote: <span class='date-right'>7 hours ago</span></h4>
			<p class="message_section">skdjfdkghksdjfh</p>

			<div class="comments">
				<div class="comment">
					<h4>Mark Guillen wrote: <span class='date-right'>7 hours ago</span></h4>
					<p class="message_section">skdjfdkghksdjfh</p>
				</div>

				<div class="comment">
					<h4>Mark Guillen wrote: <span class='date-right'>7 hours ago</span></h4>
					<p class="message_section">skdjfdkghksdjfh</p>
				</div>

				<form action="users/add_comment" method="post">
					<div class="form-group">
						<textarea class="comment_box"></textarea>
					</div>
					<button type="submit" class="btn btn-success float-right">Post</button>
				</form>
			</div>
		</div>

		<div class="message">
			<h4>Mark Guillen wrote: <span class='date-right'>7 hours ago</span></h4>
			<p class="message_section">skdjfdkghksdjfh</p>

			<div class="comments">
				<div class="comment">
					<h4>Mark Guillen wrote: <span class='date-right'>7 hours ago</span></h4>
					<p class="message_section">skdjfdkghksdjfh</p>
				</div>

				<div class="comment">
					<h4>Mark Guillen wrote: <span class='date-right'>7 hours ago</span></h4>
					<p class="message_section">skdjfdkghksdjfh</p>
				</div>

				<form action="/users/add_comment" method="post">
					<div class="form-group">
						<textarea class="comment_box"></textarea>
					</div>
					<button type="submit" class="btn btn-success float-right">Post</button>
				</form>
			</div>
		</div>
	</div>
</div>



</body>
</html>
