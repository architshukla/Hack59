<?php
	$eventid=$_POST['eventid'];
	$username="rohit";
	$amount=$_POST["amount"];
	$what=$_POST["what"];

	require_once("../includes/connection.php");
	if(mysqli_query($connection, "update eventmembers set amount=$amount, what='$what' where membername='$username' and eventid=$eventid") == FALSE)
	{
		echo "error:Amount update failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Amount updated";
	}
	require_once("../includes/footer.php");
?>