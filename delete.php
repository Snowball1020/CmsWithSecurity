<?php ob_start();

// auth check
require_once('auth.php');

// save form inputs into variables
$user_id = $_GET['user_id'];

// connect to the database
require_once('db.php');

// set up the SQL DELETE command to remove the selected movie
$sql = "DELETE FROM user WHERE user_id = :user_id";

	
// create a command object and fill the parameters with the movie_id value
$cmd = $db->prepare($sql);
$cmd->bindParam(':user_id', $user_id, PDO::PARAM_INT);

// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;

// redirect to updated movies.php 
header('location:display.php');

require_once('footer.php');
ob_flush(); ?>