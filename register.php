<?php 
$page_title = null;
$page_title = 'User Registration';
require_once('header.php'); ?>


<main class="container">
	<h1 style = "background-color: pink">User Registration</h1>
	<form method="post" action="save-registration.php" enctype="multipart/form-data">
		<fieldset class="form-group">
			<label for="name" class="col-sm-2">Name:</label>
			<input name="name" type="text" />
		</fieldset>

		<fieldset class="form-group">
			<label for="email" class="col-sm-2">Email:</label>
			<input name="email" type="email" />
		</fieldset>	

		<fieldset class="form-group">
			<label for="location" class="col-sm-2">Location:</label>
			<input name="location" type="text" />
		</fieldset>

		<fieldset class="form-group">
			<label for="profile" class="col-sm-2">Profile:</label>
			<input name="profile" type="file" />
		</fieldset>

		<fieldset class="form-group">
			<label for="skill" class="col-sm-2">Skill:</label>
			<input name="skill" type="text" />
		</fieldset>

		<fieldset class="form-group">
			<label for="password" class="col-sm-2">Password:</label>
			<input name="password" type="password" />
		</fieldset>

		<fieldset class="form-group">
			<label for="confirm" class="col-sm-2">Confirm Password:</label>
			<input name="confirm" type="password" />
		</fieldset>


		<button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
	
		<p><br></p>

	</form>
</main>

<?php require_once('footer.php'); ?>
