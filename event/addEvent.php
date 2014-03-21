<?php
	$eventname = $_POST['eventname'];
	$creatorname = $_POST['creatorname'];

	require_once("../includes/connection.php");
	if(mysqli_query($connection, "insert into events(eventname, creatorname) values(\"$eventname\",\"$creatorname\");") == FALSE)
	{
		echo "error:Event creation failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Event created successfully!";
	}
	if(($data = mysqli_query($connection, "select * from events where eventname='$eventname'")) == FALSE)
	{
		echo "error:Pool event creation failed. ".mysqli_error($connection);
	}
	else
	{
		$row = mysqli_fetch_array($data);
		$eventid=$row["eventid"];
		if(mysqli_query($connection, "insert into eventmembers values($eventid,'$creatorname', 0,'')") == FALSE)
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