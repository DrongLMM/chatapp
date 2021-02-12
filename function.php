<?php

	require_once('config.php');


	function email_exits(){

		global $connection;

		global $email;

		$query = $connection->query("SELECT * FROM users WHERE email = '$email'");

		if(mysqli_num_rows($query)==1){

			return true;
		}
	}


	function logged_in(){

		if ($_SESSION['success']) {
			
			return true;
		}
	}