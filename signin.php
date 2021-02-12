<?php
	
	session_start();

	require_once('function.php');


	if (logged_in()) {
		
		header("location: chat.php");
	}



	

	if (isset($_POST['signin'])): ?>

		<h1>Welcome to chatapp! <br> Sign In Now</h1>

			<form class="signin-form" action="" method="POST">

				<input class="signup-ipt" type="email" name="email" placeholder="Enter Your email Address">
				<input class="signup-ipt" type="password" name="password" placeholder="Enter Your password">

				<input type="submit" name="loginhobe" value="Sign In">
				
			</form>

			<p>Not Signed Up Yet? <a class="signup" href="signup.php">Sign Up</a></p>
			<script src="js/jquery.js"></script>
			<script src="js/script.js"></script>
<?php
	
	die();
	endif;

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = $connection->query("SELECT * FROM users WHERE email = '$email'");

		if(email_exits()){

			$row = mysqli_fetch_object($query);

			$firstname = $row->firsname;
			$lastname = $row->lastname;
			

			if(md5($password) == $row->pwd){

				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['email'] = $email;
				$_SESSION['success'] = 'hobe';

				header('location: chat.php');
			}

			if(md5($password) != $row->pwd): ?>

				<div class="box">
					<h1>Welcome to chatapp! <br> Sign In Now</h1>

					<form class="signin-form" action="" method="POST">

						<input class="signup-ipt" type="email" name="email" placeholder="Enter Your email Address">
						<input class="signup-ipt" type="password" name="password" placeholder="Enter Your password">

						<input type="submit" name="loginhobe" value="Sign In">
						
					</form>

					<p class="error">You password does't match. Try again.</a></p>
					<script src="js/jquery.js"></script>
					<script src="js/script.js"></script>
				</div>
		<?php

			endif;
		}
		if(mysqli_num_rows($query)==0): ?>

			<div class="box">
			<h1>Welcome to chatapp! <br> Sign In Now</h1>

			<form class="signin-form" action="" method="POST">

				<input class="signup-ipt" type="email" name="email" placeholder="Enter Your email Address">
				<input class="signup-ipt" type="password" name="password" placeholder="Enter Your password">

				<input type="submit" name="loginhobe" value="Sign In">
				
			</form>

			<p class="error">You are not registered yet. <a class="signup" href="signup.php">Register Now</a></p>
			<script src="js/jquery.js"></script>
			<script src="js/script.js"></script>
			</div>
		<?php

		endif;

		die();
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

			<h1>Welcome to chatapp! <br> Sign In Now</h1>

			<form class="signin-form" action="" method="POST">

				<input class="signup-ipt" type="email" name="email" placeholder="Enter Your email Address">
				<input class="signup-ipt" type="password" name="password" placeholder="Enter Your password">

				<input type="submit" name="loginhobe" value="Sign In">
				
			</form>

			<p>Not Signed Up Yet? <a class="signup" href="signup.php">Sign Up</a></p>
		</div>

	</div>


	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>