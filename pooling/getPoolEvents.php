<?php
	session_start();
	if(isset($_SESSION['username']))
		$membername = $_SESSION['username'];
	else
		$membername = "archit";

	require_once("../includes/connection.php");
	if(($data = mysqli_query($connection, "select * from poolmembers where membername='$membername'")) == FALSE)
	{
		echo "error:Events find failed. ".mysqli_error($connection);
	}
	else
	{
		while($row = mysqli_fetch_array($data))
		{
			if(($data2 = mysqli_query($connection, "select * from poolevents where eventid=".$row['eventid'])) == FALSE)
			{
				echo "error:Events find failed. ".mysqli_error($connection);
			}
			else
			{
				$row2 = mysqli_fetch_array($data2);
				  echo "<label><input type='radio' name='eventid'  value='".$row2["eventid"]."'> ".$row2["eventname"]."(EventId: ".$row2["eventid"].")</label> <br/>";
			}
		}
	}
	require_once("../includes/footer.php");
?>