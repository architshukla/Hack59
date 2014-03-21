<?php
	session_start();
	$filehandle = fopen("credentials.txt", "r");
	while(!feof($filehandle))
	{
		$string = fgets($filehandle);
		if(isset($_SESSION['username']))
			$array = array("login"=> trim($_SESSION['username']), "password"=> trim($string));
		else
			$array = array("login"=> trim('archit'), "password"=> trim($string));
	}
	header('Content-type: application/json');
	echo json_encode($array);
	fclose($filehandle);
?>
