<?php 

// We need to use sessions, so you should always start sessions using the below code.
session_start();

if(isset($_SESSION['id']) && isset($_POST['player_score']) && is_numeric($_SESSION['id']) && is_numeric($_POST['player_score'])){

	// Include the _config.php file
	require("_config.php");
	
	$sql = "UPDATE `accounts` SET score='".$_POST['player_score']."' WHERE id='".$_SESSION['id']."'";

	if ($con->query($sql) === TRUE) {
	  //Record updated successfully
	} else {
	  //Error updating record: $con->error
	}
		
	$con->close();
	
}
?> 