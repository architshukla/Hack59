<?php
	$id = 1;
	$name = "rohit";
	$amount = 1000;

	require_once("../includes/connection.php");
	if(($data = mysqli_query($connection, "select * from poolevents where eventid=$id")) == FALSE)
	{
		echo "error:Event not found. ".mysqli_error($connection);
	}

	$event = mysqli_fetch_array($data);
	if($event["settled"] == 1)
	{
		echo "info:Event has already been settled.";
		return;
	}

	if(mysqli_query($connection, "update poolmembers set amount=amount+$amount where eventid=$id and membername='$name'") == FALSE)
	{
		echo "error:Pledging failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Pledged successfully!";
	}

	if(($data = mysqli_query($connection, "select sum(amount) from poolmembers where eventid=$id")) == FALSE)
	{
		echo "error:Event not found. ".mysqli_error($connection);
	}
	$sum = mysqli_fetch_array($data);
	if($sum[0] >= $event["amount"])
	{
		if(mysqli_query($connection, "update poolevents set settled=1 where eventid=$id") == FALSE)
		{
			echo "error:Pledging failed. ".mysqli_error($connection);
		}
	}

	require_once("../includes/footer.php");
?>