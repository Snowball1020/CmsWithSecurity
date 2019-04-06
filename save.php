<?php ob_start();

// auth check
require_once('auth.php');

// header
$page_title = null;
$page_title = 'Saving your information...';
require_once('header.php');

// save form inputs into variables
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$location = $_POST['location'];
$profile = $_FILES['profile']['name'];
$skill = $_POST['skill'];

// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($name)) {
	// notify the user
	echo 'Name is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($email)) {
	// notify the user
	echo 'Email is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($location)) {
	// notify the user
	echo 'Location is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($profile)) {
	// notify the user
	echo 'Profile is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($skill)) {
	// notify the user
	echo 'Skill is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}


if ($ok == true) {
	// connect to the database
	require_once('db.php');
	    require('appvars.php'); 

	
	if (!empty($profile)) {

            if($_FILES['profile']['error'] == 0) {
              
              $target = UPLOADPATH . $profile; 
              
              if(move_uploaded_file($_FILES['profile']['tmp_name'], $target ));
              // set up our query 
                          
              
                    // set up the sql insert
					$sql = 'UPDATE user SET name = :name, email = :email, location = :location, profile = :profile, skill = :skill 	WHERE user_id = :user_id';

                    // hash the password
                    //   $hashed_password = hash('sha512', $password); not as secure as password_hash()

                    // fill the params and execute
                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':name', $name ); //PDO::PARAM_STR, 50
                    $cmd->bindParam(':email', $email ); //PDO::PARAM_STR, 50
                    $cmd->bindParam(':location', $location); //PDO::PARAM_STR, 128
                    $cmd->bindParam(':profile', $profile); //PDO::PARAM_STR, 128
                    $cmd->bindParam(':skill', $skill); //PDO::PARAM_STR, 128
                    $cmd->bindParam(':user_id', $user_id); //PDO::PARAM_STR, 128


                    $cmd->execute();

                    // disconnect
                    $db = null;

                    echo 'Your change was updated.  Click to <a href="login.php">Log In</a>';        
                }


            }


	}
	else {
		// set up the SQL UPDATE command to modify the existing movie
		$sql = 'UPDATE user SET name = :name, email = :email, location = :location, profile = :profile, skill = :skill WHERE user_id = :user_id';


			$cmd = $db->prepare($sql);
			$cmd->bindParam(':user_id', $user_id);	
			$cmd->bindParam(':name', $name);
			$cmd->bindParam(':email', $email);	
			$cmd->bindParam(':location', $location);
			$cmd->bindParam(':profile', $profile);
			$cmd->bindParam(':skill', $skill);
			
			// fill the movie_id if we have one
			if (!empty($user_id)) {
				$cmd->bindParam(':user_id', $user_id);
			}
			
			// execute the command
			$cmd->execute();
			
			// disconnect from the database
			$db = null;
			
			// show confirmation
			echo "Data Saved";

			}

	//        $sql = 'UPDATE games SET name = :name, age_limit = :age_limit,
 	//         release_date = :release_date, size = :size WHERE game_id = :game_id';



	
	// create a command object and fill the parameters with the form values


require_once('footer.php');
ob_flush();
?>
