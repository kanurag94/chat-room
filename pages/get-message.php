<?php

require "connect.php";

$outputArray = array();

$lastID = 0;

if (isset($_GET['lastid']))
{
	$lastID = $_GET['lastid'];
}

$query = "SELECT * FROM chat WHERE id > $lastID;";

if($results = $conn->query($query))
{
	$currentTime = new DateTime('now');
	
	while ($row = $results->fetch_assoc())
	{
		$dateTime = new DateTime($row['time']);
		$interval = date_diff($currentTime, $dateTime);

		$outputArray[] = array(
								'id' => $row['id'],
								'name' => $row['name'],
								'time' => date("h:i:s", strtotime($row['time'])),
								'passedtime' => getPrintableInterval($interval),
								'message' => $row['message']
							   );
	}
	
	$results->free();
}

$conn->close();

echo json_encode($outputArray);

function getPrintableInterval($interval)
{
	$str = '';
	
	if ($interval->y)
		$str .= $interval->y . ' Years ';
	if ($interval->m)
		$str .= $interval->m . ' Months ';
	if ($interval->d)
		$str .= $interval->d . ' Days ';
	if ($interval->h)
		$str .= $interval->h . ' Hours ';
	if ($interval->i)
		$str .= $interval->i . ' Minutes ';
	if ($interval->s)
		$str .= $interval->s . ' Seconds ';
	
	if (empty($str))
		$str = '0 seconds ';
	
	$str .= 'ago';
	return $str;
}

?>