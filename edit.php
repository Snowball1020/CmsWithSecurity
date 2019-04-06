<?php ob_start();

// authentication check
require_once('auth.php');

// set page title
$page_title = null;
$page_title = 'Person Details';

// embed the header
require_once('header.php');

// initialize variables
$user_id = null;
$name = null;
$email = null;
$location = null;
$profile = null;
$skill = null;

$user_id = $_GET['user_id'];

// check the url for a movie_id parameter and store the value in a variable if we find one
if (empty($_GET['user_id']) == false) {

	// connect
	require_once('db.php');
	
	// write the sql query
	$sql = "SELECT * FROM user WHERE user_id = :user_id";
	
	// execute the query and store the results
	$cmd = $db->prepare($sql);
	$cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$cmd->execute();
	$users = $cmd->fetchAll();
	
	// populate the fields for the selected movie from the query result
	foreach ($users as $user) {
		$name = $user['name'];
		$email = $user['email'];
		$location = $user['location'];
		$profile = $user['profile'];
		$skill = $user['skill'];		
	}
	
	// disconnect
	$db = null;
}

?>

	<div class="container">
		<h1>Person Details</h1>

	    <form method="post" action="save.php" enctype="multipart/form-data">
	        <fieldset class="form-group">
	            <label for="name" class="col-sm-2">Name:</label>
	            <input name="name" id="name" type="type" value="<?php echo $name; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="email" class="col-sm-2">Email:</label>
	            <input name="email" id="email" type="email" value="<?php echo $email; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="location" class="col-sm-2">Location:</label>
	            <input name="location" id="location" type="text" value="<?php echo $location; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="profile" class="col-sm-2">Profile:</label>
	            <input name="profile" id="profile" type="file" value="<?php echo $profile; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="skill" class="col-sm-2">Skill:</label>
	            <input name="skill" id="skill" type="text" value="<?php echo $skill; ?>" />
	        </fieldset>

	        <input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
	        <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
	    </form>
	</div>

<?php // embed footer
require_once('footer.php'); 
ob_flush(); ?>