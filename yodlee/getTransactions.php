<?php
require_once "config.inc.php";
require_once "restclient.class.php";

## =================== / =======================================
## Parameters  
## =================== / =======================================
$cobSessionToken = ( isset($_POST["session"]) ) ? $_POST["session"] : "";
$userSessionToken = ( isset($_POST["usertoken"]) ) ? $_POST["usertoken"] : "";
$from = ( isset($_POST["from"]) ) ? $_POST["from"] : "01-01-2013";
$to = ( isset($_POST["to"]) ) ? $_POST["to"] : "01-01-2014";


$response = array();

$config = array(
	"url" => Yodlee\ConfigInc\serviceBaseUrl.Yodlee\ConfigInc\URL_USER_SEARCH,
	"parameters" => array(
		"cobSessionToken" => $cobSessionToken,
		"userSessionToken" => $userSessionToken,
		"transactionSearchRequest.containerType" => "bank",
		"transactionSearchRequest.higherFetchLimit" => "500",
		"transactionSearchRequest.lowerFetchLimit" => "1",
		"transactionSearchRequest.resultRange.endNumber" => "100",
		"transactionSearchRequest.resultRange.startNumber" => "1",	
		"transactionSearchRequest.searchClients.clientId" => "1",
		"transactionSearchRequest.searchClients.clientName" => "rohitshashank",	
		"transactionSearchRequest.ignoreUserInput" => "true",	
		"transactionSearchRequest.searchFilter.currencyCode" => "USD", //	This is the currency code that is to be considered as part of the search filter.	Yes	USD
		"transactionSearchRequest.searchFilter.postDateRange.fromDate" => $from, //This is the starting date of the postDateRange which is the range of dates to be searched for.	Yes	01-01-2013
		"transactionSearchRequest.searchFilter.postDateRange.toDate" => $to,	//This is the ending date of the postDateRange which is the range of dates to be searched for.	Yes	01-31-2013
		"transactionSearchRequest.searchFilter.transactionSplitType" => "ALL_TRANSACTION"
		)
	);

$response_to_request   = Yodlee\restClient::Post($config["url"], $config["parameters"]);

header('Content-type: application/json');
echo json_encode($response_to_request);
?>