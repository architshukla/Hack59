<?php
	$filehandle = fopen("credentials.txt", "r");
	while(!feof($filehandle))
	{
		$string = fgets($filehandle);
		$parts = explode("|", $string);
		$array = array("login"=> trim($parts[0]), "password"=> trim($parts[1]));
	}
	header('Content-type: application/json');
	echo json_encode($array);
	fclose($filehandle);
?>
