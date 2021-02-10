<?php  

// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Define noDirectRequest to allow include files 
define('noDirectRequest', TRUE);

// Include the _authenticate.php file
require("_authenticate.php");

// Set the meta title for the age
$pageTitle="Login";

?>
<!DOCTYPE html>
<html>
<?php include ("_template/_header.php");?>
	<body>
		<div class="login">
			<h1>Login</h1>
			<div class="links">
				<a href="index.php" class="active">Login</a>
				<a href="register.php">Register</a>
			</div>
            <?php if(isset($error_msg)){echo "<p class=\"form_error\">".$error_msg."</p>";}?>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>

				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login" name="login">
			</form>
		</div>
	</body>
</html>