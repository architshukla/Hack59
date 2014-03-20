<?php
	$eventid = $_POST['eventid'];
	$name = $_POST['name'];

	require_once("../includes/connection.php");
	if(mysqli_query($connection, "insert into poolmembers values($eventid,'$name', 0)") == FALSE)
	{
		echo "error:User addition failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:User added successfully!";
	}
	require_once("../includes/footer.php");
?>