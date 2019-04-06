<?php ob_start();

// authentication check
require_once('auth.php');
?>

<div style = "text-align: center" >
<h4 >looking for someone?</h4>
<form action ="search.php" method="get">
	<label for="usersearch"> Please type user name: </label>
	<input type="text" name="usersearch" id="usersearch">
	<input type="submit" name="submit" value="Search">
</form>
</div>



<?php 
// set the page title
$page_title = null;
$page_title = 'Registered Users';

// embed the header
require_once('header.php');

echo "<div style='border-bottom:2px solid blue;'> 
	 <h2 style='text-align:center;'> Administrator Page</h2> 
	 </div>";


// connect
require_once('db.php');
require ('appvars.php');      

// write the sql query
$sql = "SELECT * FROM user";

// execute the query and store the results
$cmd = $db->prepare($sql);
$cmd->execute();
$users = $cmd->fetchAll();


// start the html display table
echo '<div style="text-align:center;"><a style="font-size:20"href="register.php" title="Register New">Register New??</a></div>
<table class="table table-striped table-hover"><thead><th>User Name</th><th>Email</th><th>Location</th><th>Picture</th><th>Skill</th>
<th>Edit</th><th>Delete</th></thead><tbody>';


//$sql = "SELECT profile FROM user;"; 
//$cmd = $db ->prepare($sql);         
//$cmd->execute(); 
//$profiles = $cmd->fetchAll(); 

//echo '<div class="photocontainer">'; 
          
//foreach($profiles as $profile) {
//echo '<div><img src="' . UPLOADPATH . $profile['profile'] . '">
//<a href="delete.php?profile=' . $profile['profile'] . '" onclick="return confirm(\'Are you sure?\');">Delete</a></div>';
//}
//echo '</div>'; 

        



// loop through the results and show each movie in a new row and each value in a new column
foreach ($users as $user) {
	echo '<tr>
		<td>' . $user['name'] . '</td>
		<td>' . $user['email'] . '</td>
		<td>' . $user['location'] . '</td>
		<td><img height="42" width="42" src="' . UPLOADPATH . $user['profile'] . '"</td>
		<td>' . $user['skill'] . '</a></td>
		<td><a href="edit.php?user_id=' . $user['user_id'] . '">Edit</a></td>
		<td><a href="delete.php?user_id=' . $user['user_id'] . '" 
			onclick="return confirm(\'Are you sure you want to delete this movie?\');">Delete</td></tr>';
}

// close the table and body
echo '</tbody></table>';



// disconnect
$db = null;

// embed footer
require_once('footer.php');
ob_flush();
?>


