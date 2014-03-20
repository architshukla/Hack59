<?php
	$var = '[{"name":"sandeep", "amount": 371, "what": "food"}, 
			{"name":"cat", "amount": 562, "what": "water"},
			{"name":"archit", "amount": 794, "what": "transport"},
			{"name":"rohit", "amount": 210, "what": "fun"}]';

	function sortAsc($a, $b)
	{
    	return $b["amount"] - $a["amount"];
	}

	function average($ourJSON)
	{
		$averageValue = 0;
		foreach($ourJSON as $entry)
		{
			$averageValue += $entry["amount"];
		}
		return $averageValue/count($ourJSON);
	}

	require_once("../includes/connection.php");
	
	$results = json_decode($var, true);
	
	if(!$results)
	{
		return "error:Incorrect JSON format.";
	}

	$averageValue = average($results);

	foreach($results as $result)
	{
		if(mysqli_query($connection, "update eventmembers set amount=".$result["amount"]." where membername='".$result["name"]."'") == FALSE)
		{
			echo "error:Amount update failed. ".mysqli_error($connection);
		}
	}

	$get = [];
	$give = [];

	for($i = 0; $i < count($results); $i++)
	{
		$balance = $results[$i]["amount"] - $averageValue;
		if($balance > 0)
		{
			$results[$i]["balance"] = $balance;
			array_push($get, $results[$i]);
		}
		else if($balance < 0)
		{
			$results[$i]["balance"] = abs($balance);
			array_push($give, $results[$i]);
		}
	}

	usort($give, "sortAsc");
	usort($get, "sortAsc");

	$output = [];

	for($i = 0; $i < count($give); $i++)
	{
		for($j = 0; $j < count($get); $j++)
		{
			if($give[$i]["balance"] == 0)
				break;

			if($get[$j]["balance"] == 0)
				continue;

			$balance = $get[$j]["balance"] > $give[$i]["balance"] ? $give[$i]["balance"] : $get[$j]["balance"];
			// echo $give[$i]["name"]." gives ".$get[$j]["name"]." ".($balance)."<br>";
			
			array_push($output, array(
				"give" => $give[$i]["name"],
				"get" => $get[$j]["name"],
				"balance" => $balance,
				"what" => $get[$j]["what"]));
			
			$give[$i]["balance"] -= $balance;
			$get[$j]["balance"] -= $balance;
		}
	}

	echo  json_encode($output);
	require_once("../includes/footer.php");
?>