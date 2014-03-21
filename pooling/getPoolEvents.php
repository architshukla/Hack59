<?php
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
				echo "<input type='radio' value='".$row2["eventid"]."' name=eventid >".$row2["eventname"]."(EventId: ".$row2["eventid"].")"."</input>";
			}
		}
	}
	require_once("../includes/footer.php");
?>