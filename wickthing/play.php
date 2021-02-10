<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

// Define noDirectRequest to allow include files 
define('noDirectRequest', TRUE);

// Include the _config.php file
require("_config.php"); 

// Set the meta title for the age
$pageTitle="Play Page";

// Set the menu item to active
$pageActive = "play";

?>
<!DOCTYPE html>
<html>
<?php include ("_template/_header.php");?>
	<body class="loggedin">
<?php include ("_template/_menubar.php");?>
<?php include ("cookieClicker/index.php");?>
	</body>
</html>