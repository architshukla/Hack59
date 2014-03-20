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
	require_once("../includes/footer.php");
?>