<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php echo $page_title; ?></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">


</head>

<body style="background-color: #edf3ca">

<nav class="navbar">
	<a href="#" title="Phase Two" class="navbar-brand">Customer Manegement System Ver 1.2</a>
	
		<?php // show public or private links depending on whether the user has been authenticated
		if (!empty($_SESSION['user_id'])) { ?>
			<div style="text-align: right;"><a style = "font-size: 30" href="logout.php" title="Logout">Logout</a></div>
		<?php 
		}
		else { ?>			
		<ul class="nav navbar-nav">
		
			<li><a href="register.php" title="Register">Register</a></li>
			<li><a href="login.php" title="Login">Login As Admin</a></li>
   			<li><a href="userlogin.php" title="Login">Login As User</a></li>

		<?php } ?>
	</ul>
</nav>

<!-- page content starts here -->