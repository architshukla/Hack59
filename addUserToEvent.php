<?php
	$id = 1;
	$name = "archit";

	require_once("includes/connection.php");
	if(mysqli_query($connection, "insert into eventmembers values($id,'$name', 0)") == FALSE)
	{
		echo "error:User addition failed. ".mysqli_error($connection);
	}
	else
	{
		echo "success:User added successfully!";
	}
	require_once("includes/footer.php");
?>