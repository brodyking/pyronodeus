<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Define noDirectRequest to allow include files 
define('noDirectRequest', TRUE);

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

// Set the meta title for the age
$pageTitle="Home Page";

// Set the menu item to active
$pageActive = "home";

?>
<!DOCTYPE html>
<html>
<?php include ("_template/_header.php");?>
	<body class="loggedin">
<?php include ("_template/_menubar.php");?>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>