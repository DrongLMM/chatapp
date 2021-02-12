<?php
	
	session_start();

	require_once('function.php');



		if (!logged_in()) {
		
		header("location: index.php");
		}

	if (isset($_POST['chatstart'])) {

		$email = $_SESSION['email'];
		
		$msg_content = $_POST['msg'];

		$query = $connection->query("INSERT INTO chatmsg (email, msg)VALUES('$email', '$msg_content')");


		die();
	}

	if (isset($_POST['updatehobe'])) {
		
		$message = $connection->query("SELECT * FROM chatmsg");

		while($row=mysqli_fetch_object($message)){

			$email = $row->email;

			$names = $connection->query("SELECT * FROM users WHERE email = '$email'");

			$name = mysqli_fetch_object($names);

			echo "<p><span class='name'>$name->firstname $name->lastname : </span>$row->msg</p>";
		}

		die();
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container chat-container">
		<div class="box">
			<div class="signout">
				<a href="signout.php">Sign Out</a>
			</div>

			
				<div class="chat-box">

					<div class="msg">
						

					</div>

					<form class="msg-form" action="" method="POST">

						<input  type="text" name="msg" placeholder="Enter your message">
						
						<input type="submit" name="send-msg" value="Send">
						
					</form>

				</div>
		
		</div>	

	</div>


	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
</body>
</html>