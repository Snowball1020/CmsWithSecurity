<?php
$page_title = 'Saving your Registration...';
require_once ('header.php');

// store the inputs into variables
$name = $_POST['name'];
$email = $_POST['email'];
$location = $_POST['location'];
$profile = $_FILES['profile']['name'];
$skill = $_POST['skill'];
$password = $_POST['password'];

$confirm = $_POST['confirm'];
$ok = true;



// validation
if (empty($name)) {
    echo 'Name is required<br />';
    $ok = false;
}

if (empty($password)) {
    echo 'Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords must match<br />';
    $ok = false;
}

if ($ok) {
    // connect
    require_once ('db.php');
    require('appvars.php'); 

if(!empty($profile)) {

            if($_FILES['profile']['error'] == 0) {
              
              $target = UPLOADPATH . $profile; 
              
              //move the file to the images folder 
              echo $_FILES['profile']['tmp_name'];

              
              if(move_uploaded_file($_FILES['profile']['tmp_name'], $target )){

                }
              // set up our query 
                          
              
                    // set up the sql insert
                    $sql = "INSERT INTO user (name, email, location, profile, skill, password) 
                            VALUES (:name, :email, :location, :profile, :skill, :password)";

                    // hash the password
                    //   $hashed_password = hash('sha512', $password); not as secure as password_hash()

                    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

                    // fill the params and execute
                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':name', $name ); //PDO::PARAM_STR, 50
                    $cmd->bindParam(':email', $email ); //PDO::PARAM_STR, 50
                    $cmd->bindParam(':location', $location); //PDO::PARAM_STR, 128
                    $cmd->bindParam(':profile', $profile); //PDO::PARAM_STR, 128
                    $cmd->bindParam(':skill', $skill); //PDO::PARAM_STR, 128
                    $cmd->bindParam(':password', $hashed_password); //PDO::PARAM_STR, 128


                    $cmd->execute();

                    // disconnect
                    $db = null;

                    echo 'Your registration was successful.  Click to <a href="login.php">Log In</a>';        
     
                }


            }

}

require_once ('footer.php');
?>
