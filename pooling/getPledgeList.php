<?php
	$eventid = $_POST['eventid'];
	require_once("../includes/connection.php");
	$jsonArray = [];
	if(($data = mysqli_query($connection, "select * from poolevents where eventid=$eventid")) == FALSE)
	{
		echo "error:Fetch failed. ".mysqli_error($connection);
	} else {
		$poolevent = mysqli_fetch_array($data);
		if ($poolevent["settled"]==1) {
			if(($data = mysqli_query($connection, "select * from poolmembers where eventid=$eventid")) == FALSE)
			{
				echo "error:Fetch failed. ".mysqli_error($connection);
			}
			else
			{
				while($pledger = mysqli_fetch_array($data))
				{
					array_push($jsonArray, array("name"=>$pledger["membername"], "amount"=> $pledger["amount"]));
				}		
			}
			echo json_encode($jsonArray);
		}else{
			echo "message: pool event is not yet settled to view the list";
		}
	}
	require_once("../includes/footer.php");
?>