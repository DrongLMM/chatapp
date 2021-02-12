<?php
	
	session_start();
	
	require_once('function.php');

	if (logged_in()) {
		
		header("location: chat.php");
	}
	
	

	if (isset($_POST['signup'])): ?>

		<h1>Welcome to chatapp! <br> Sign Up Now</h1>

			<form class="registration" action="" method="POST">

				<input class="signup-ipt" type="text" name="firstname" placeholder="Enter Your First Name">
				
				<input class="signup-ipt" type="text" name="lastname" placeholder="Enter Your Last Name">
				
				<input class="signup-ipt" type="email" name="email" placeholder="Enter Your email Address">
				
				<input class="signup-ipt pwd" type="password" name="password" placeholder="Enter Your password" value="">
				

				<input type="submit" name="register" value="Sign Up">
				
			</form>

			<p class="regi-suc">Already have an account? <a class="signin" href="signin.php">Sign in</a></p>
			<script src="js/jquery.js"></script>
			<script src="js/script.js"></script>
<?php
	
	die();

	endif;





	if (isset($_POST['register'])) {

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$pwd = md5($password);

		if(!email_exits()){
		
		$error = array();

		if($firstname == NULL){

			$error['fname'] = "First name is blank";
		}
		if($lastname == NULL){

			$error['lname'] = "Last name is blank";
		}
		if($email == NULL){

			$error['email'] = "Email address is blank";
		}
		if($password == NULL){

			$error['password'] = "Password is blank";

		}elseif(strlen($password) <= 5) {
			
			$error['password'] = "Password must be in 5 character";
		}

		


		if(count($error) == 0){

			$query = $connection->query("INSERT INTO users (firstname, lastname, email, pwd)VALUES('$firstname','$lastname','$email','$pwd')");
			if($query): ?>

			<p>Your registration is successful. <a class="signin" href="signin.php">Sign In</a></p>
			<script src="js/jquery.js"></script>
			<script src="js/script.js"></script>
		


		

		
	<?php
		die();
		endif;

		}elseif($error['fname'] ){

			echo $error['fname'] ;

		die();

		}elseif($error['lname']){

			echo $error['lname'];

		die();
		}elseif($error['email']){

			echo $error['email'];
		die();

		}elseif($error['password']){

			echo $error['password'];
		die();
		}

		
	}else{
		echo "This email is already registered. Try with another email.";
		die();
	}

		
	
	}

	
	

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">

		<div class="box">

			<h1>Welcome to chatapp! <br> Sign Up Now</h1>

			<form class="registration" action="" method="POST">

				<input class="signup-ipt" type="text" name="firstname" placeholder="Enter Your First Name">
				<input class="signup-ipt" type="text" name="lastname" placeholder="Enter Your Last Name">
				<input class="signup-ipt" type="email" name="email" placeholder="Enter Your email Address">
				<input class="signup-ipt" type="password" name="password" placeholder="Enter Your password">

				<input type="submit" name="register" value="Sign Up">
				
			</form>

			<p class="regi-suc">Already have an account? <a href="signin.php">Sign in</a></p>
		</div>

	</div>


	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>