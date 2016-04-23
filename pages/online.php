<?php 

require "connect.php";

session_start();

$outputArray = array();

if(isset($_SESSION['email'])) 
{
	//update data that user is still logged in
	$timestamp = date("Y-m-d H:i:s");
	$query = "INSERT INTO onlineusers(email, fname, lastactive) VALUES('" . $_SESSION['email'] . "', '" . $_SESSION['fname'] . "', '" . $timestamp . "') ON DUPLICATE KEY UPDATE lastactive = '" . $timestamp . "'";
	$conn->query($query);
}

//get logged in users data
$timestamp = date("Y-m-d H:i:s", strtotime("-1 minute"));
$query = "SELECT fname FROM `onlineusers` WHERE `lastactive` > '".$timestamp."' ORDER BY `fname` ASC";

if($results = $conn->query($query))
{
	while ($row = $results->fetch_assoc())
	{
		$outputArray[] = $row['fname'];
	}	
}
$conn->close();

echo json_encode($outputArray);

?>
