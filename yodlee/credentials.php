<?php
	session_start();
	
		$array = array("login"=> trim('sbMemshashank1'), "password"=> trim("sbMemshashank1#123"));
	
	header('Content-type: application/json');
	echo json_encode($array);
	fclose($filehandle);
?>
