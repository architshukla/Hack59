<?php
	$eventid = $_POST['eventid'];
	$membername = $_POST['membername'];

	require_once("../includes/connection.php");
	if(mysqli_query($connection, "insert into eventmembers values($eventid,'$membername', 0,'')") == FALSE)
	{
		echo "error:User addition failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:User added successfully!";
	}
	require_once("../includes/footer.php");
?>