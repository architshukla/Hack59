<?php
require_once "config.inc.php";
require_once "restclient.class.php";

## =================== / =======================================
## Parameters  
## =================== / =======================================
$cobSessionToken = ( isset($_POST["session"]) ) ? $_POST["session"] : "";
$userSessionToken = ( isset($_POST["usertoken"]) ) ? $_POST["usertoken"] : "";


$response = array();

$config = array(
	"url" => Yodlee\ConfigInc\serviceBaseUrl.Yodlee\ConfigInc\URL_GET_TRANSACTION_CATEGORIES,
	"parameters" => array(
		"cobSessionToken" => $cobSessionToken,
		"userSessionToken" => $userSessionToken
		)
	);

$response_to_request   = Yodlee\restClient::Post($config["url"], $config["parameters"]);

print json_encode($response_to_request);