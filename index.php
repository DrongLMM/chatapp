<?php
	session_start();

	require_once('function.php');

	if (logged_in()) {
		
		header("location: chat.php");
	}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chatapp</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container container-1 ">
		<div class="box">
			<a class="signup" href="signup.php">Create an account</a><br>
			Already have an account? <a class="signin" href="signin.php">Sign in</a>
		</div>
	</div>
	

	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>