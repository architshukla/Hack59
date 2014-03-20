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
	require_once("../includes/footer.php");
?>