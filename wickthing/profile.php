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

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email, score FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $score);
$stmt->fetch();
$stmt->close();

// Set the meta title for the age
$pageTitle="Profile Page";

// Set the menu item to active
$pageActive = "profile";

?>
<!DOCTYPE html>
<html>
<?php include ("_template/_header.php");?>
	<body class="loggedin">
<?php include ("_template/_menubar.php");?>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password(hashed):</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Score:</td>
						<td><?=$score?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>