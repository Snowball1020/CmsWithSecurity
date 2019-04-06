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
$email = $_GET['email'];
// embed the header
require_once('header.php');

echo "<div style='border-bottom:2px solid white;'> 
	 <h2 style='text-align:center;'> View Page</h2> 
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

//'<a href="view.php?email=' . $email = $_GET['email'] . '"
// start the html display table
echo '<div style="text-align:center;" ><a href="userdisplay.php?email=' . $email = $_GET['email'] .'" title="Go back to your page">
	 <span style="font-size:20"> Go back to your page</span></a></div>
<table class="table table-striped table-hover"><thead><th>User Name</th><th>Wmail</th><th>Location</th><th>Picture</th><th>Skill</th></thead><tbody>';

// loop through the results and show each movie in a new row and each value in a new column
foreach ($users as $user) {
	echo '<tr>
		<td>' . $user['name'] . '</td>
		<td>' . $user['email'] . '</td>
		<td>' . $user['location'] . '</td>
		<td><img height="42" width="42" src="' . UPLOADPATH . $user['profile'] . '"</td>
		<td>' . $user['skill'] . '</a></td> </tr>';
}

// close the table and body
echo '</tbody></table>';



// disconnect
$db = null;

// embed footer
require_once('footer.php');
ob_flush();
?>


