<?php
	$eventid = $_POST['eventid'];
	require_once("../includes/connection.php");
	if(mysqli_query($connection, "update events set settled=1 where eventid=$eventid") == FALSE)
	{
		echo "error:Event $eventid ending failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Event $eventid ended successfully!";
	}
	require_once("../includes/footer.php");