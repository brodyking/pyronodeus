<?php  

// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Define noDirectRequest to allow include files 
define('noDirectRequest', TRUE);

// Include the _authenticate.php file
require("_authenticate.php");

// REGISTER USER
if(isset($_POST['register']) && $_POST['register']=="Register"){
	// initializing variables
	$username = "";
	$email    = "";
	$errors = array(); 

	// receive all input values from the form
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// first check the database to make sure 
	// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM `accounts` WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($con, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	
	if ($user) { // if user exists
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists");
		}
	
		if ($user['email'] === $email) {
			array_push($errors, "email already exists");
		}
	}

	// Finally, register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database
		$query = "INSERT INTO `accounts` (username, email, password) 
				  VALUES('$username', '$email', '$password')";
		mysqli_query($con, $query);
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $con->insert_id;
		header('location: home.php');
	}
}

// Set the meta title for the age
$pageTitle="Register";

?>
<!DOCTYPE html>
<html>
<?php include ("_template/_header.php");?>
	<body>
		<div class="login">
			<h1>Register</h1>
			<div class="links">
				<a href="index.php">Login</a>
				<a href="register.php" class="active">Register</a>
			</div>
            <?php 
			if(isset($errors)){
				foreach($errors as $error){
					echo "<p class=\"form_error\">".$error."</p>";
				}
			}
			?>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password_1" placeholder="Password" id="password" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password_2" placeholder="Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register" name="register">
			</form>
		</div>
	</body>
</html>