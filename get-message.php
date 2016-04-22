<?php

require "connect.php";

$outputArray = array();

$query = "SELECT * FROM chat;";

if($results = $conn->query($query))
{
	while ($row = $results->fetch_assoc())
	{
		$id = time(0);
		$message = rand(0, 10000);
		
		$outputArray[] = array(
								'name' => $row['name'],
								'time' => $row['time'],
								'message' => $row['message']
							   );
	}
	
	$results->free();
}

$conn->close();

echo json_encode($outputArray);

?>