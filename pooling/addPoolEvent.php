<?php
	$name = "dummyevent";
	$creatorname = "archit";
	$amount = 10000;

	require_once("../includes/connection.php");
	if(mysqli_query($connection, "insert into poolevents(eventname, creatorname, amount) values(\"$name\",\"$creatorname\", $amount);") == FALSE)
	{
		echo "error:Pool event creation failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:Pool event created successfully!";
	}
	require_once("../includes/footer.php");
?>