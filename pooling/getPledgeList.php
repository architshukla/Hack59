<?php
	$id = 1;


	require_once("../includes/connection.php");
	$jsonArray = [];
	if(($data = mysqli_query($connection, "select * from poolmembers where eventid=$id")) == FALSE)
	{
		echo "error:Fetch failed. ".mysqli_error($connection);
	}
	else
	{
		while($pledger = mysqli_fetch_array($data))
		{
			array_push($jsonArray, array("name"=>$pledger["membername"], "amount"=> $pledger["amount"]));
		}		
	}
	echo json_encode($jsonArray);
	require_once("../includes/footer.php");
?>