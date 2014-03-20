<?php
	$eventid=4;

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
	
	$results = [];
	
	if(($data = mysqli_query($connection, "select * from eventmembers where eventid=$eventid")) == FALSE)
	{
		echo "error:Event members not found.";
	}
	else
	{
		while($row = mysqli_fetch_array($data))
		{
			array_push($results, array("name"=> $row["membername"], "amount"=> $row["amount"], "what"=> $row["what"]));
		}
	}

	$averageValue = average($results);

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

	header('Content-type: application/json');
	echo  json_encode($output);
	require_once("../includes/footer.php");
?>