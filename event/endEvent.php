<?php
	$eventid = 3;
	require_once("../includes/connection.php");
	if(mysqli_query($connection, "update events set settled=1 where eventid=$eventid") == FALSE)
	{
		echo "error:Event ending failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Event ended successfully!";
	}
	require_once("../includes/footer.php");