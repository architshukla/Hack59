<?php
	$eventname = $_POST['eventname'];
	$creatorname = $_POST['creatorname'];
	$amount = $_POST['amount'];

	require_once("../includes/connection.php");
	if(mysqli_query($connection, "insert into poolevents(eventname, creatorname, settled, amount) values(\"$eventname\",\"$creatorname\",0, $amount);") == FALSE)
	{
		echo "error:Pool event creation failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Pool event created successfully!";
	}

	if(($data = mysqli_query($connection, "select * from poolevents where eventname='$eventname'")) == FALSE)
	{
		echo "error:Pool event creation failed. ".mysqli_error($connection);
	}
	else
	{
		$row = mysqli_fetch_array($data);
		$eventid=$row["eventid"];
		if(mysqli_query($connection, "insert into poolmembers values($eventid,'$creatorname', 0)") == FALSE)
		{
			echo "error:User addition failed. ".mysqli_error($connection);
		}
		else
		{
			echo "success:User added successfully!";
		}
	}
	require_once("../includes/footer.php");
?>