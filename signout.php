<?php


	session_start();

	session_destroy();

	$_SESSION['success'] = "";

	header("location: index.php");