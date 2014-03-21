<?php

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	session_start();
	$text= "Enter username and password:";
// Query the database for the username and password
	if (isset($_SESSION["username"])) {
		header("Location: index.html");
		exit;
	}
	if (isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		header("Location: index.html");
	} else {
		$username = "";
		$password = "" ;
	}
?>
