<?php
	session_start();
	if(isset($_SESSION['username']))
		$membername = $_SESSION['username'];
	else
		$membername = "archit";

	require_once("../includes/connection.php");
	$count=0;
	if(($data = mysqli_query($connection, "select * from eventmembers where membername='$membername'")) == FALSE)
	{
		echo "error:Events find failed. ".mysqli_error($connection);
	}
	else
	{
		while($row = mysqli_fetch_array($data))
		{
			if(($data2 = mysqli_query($connection, "select * from events where eventid=".$row['eventid'])) == FALSE)
			{
				echo "error:Events find failed. ".mysqli_error($connection);
			}
			else
			{
				$row2 = mysqli_fetch_array($data2);
				$count++;
			}
		}
	}
	echo $count;
	require_once("../includes/footer.php");
?>