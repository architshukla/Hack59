<?php
	$membername = "archit";

	require_once("../includes/connection.php");
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
				  echo "<label><input type='radio' name='eventid'  value='".$row2["eventid"]."'> ".$row2["eventname"]."(EventId: ".$row2["eventid"].")</label> <br/>";
				//echo "<input class='radio' type='radio' value= name=eventid >"..")"."</input>";
			}
		}
	}
	require_once("../includes/footer.php");
?>