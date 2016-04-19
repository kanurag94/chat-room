<?php

/*
outputs random messages (to be used for testing ajax+json)
*/

$newMessages = rand(0, 5);

$outputArray = array();

for ($i = 0; $i < $newMessages; $i++)
{
	$id = time(0);
	$message = rand(0, 10000);
	
	$outputArray[] = array(
							'id' => $id,
							'time' => $id,
							'message' => $message
						   );
}

echo json_encode($outputArray);

?>