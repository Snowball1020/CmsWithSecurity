<?php ob_start(); ?>
<html>

<body>

<?php

$email = $_POST['email'];
$password = $_POST['password'];


//echo $email;

//echo $password;

require('db.php');

$sql = "SELECT * FROM user WHERE email = :email";

$cmd = $db->prepare($sql);
$cmd->bindParam(':email', $email);
//$cmd->bindParam(':password', $password, PDO::PARAM_STR, 128);
$cmd->execute();
$user = $cmd->fetch();

//echo $user;

//echo $password;

//echo " ";

//echo $user['password'];

//$user != null && 
if (password_verify($password, $user['password'])) {

	session_start();

	foreach  ($user as $users) {
        $_SESSION['user_id'] = $users['user_id'];

    }
    	header('location: userdisplay.php?email=' . $user['email']);


	
}else{
	echo 'Failed';

}

//else {
//    session_start(); // access the existing session

//    foreach  ($users as $user) {
//        $_SESSION['user_id'] = $user['user_id'];
//    }
//}

$db = null;



?>

</body>
</html>
<?php ob_flush(); ?>

