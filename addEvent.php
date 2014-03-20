<?php
	$id = 2;
	$name = "dummyevent";
	$creatorname = "archit";
	
	require_once("includes/connection.php");
	if(mysqli_query($connection, "insert into events values($id,\"$name\",\"$creatorname\");") == FALSE)
	{
		echo "Event creation failed. ".mysqli_error($connection);
	}
	else
	{
		echo "Event created successfully!";
	}
	require_once("includes/footer.php");
?>