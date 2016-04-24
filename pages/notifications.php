<?php
session_start();
require 'connect.php';

$groupIDS = json_decode($_POST['data']);
$id = $_SESSION['id'];

$notificationsList = array();

foreach($groupIDS as $groupID)
{
	$lastID = $conn->query("SELECT lastid FROM groupmembers WHERE userid = '$id' AND groupid = '$groupID'")->fetch_row()[0]; //no need to check
	$count = $conn->query("SELECT COUNT(*) FROM chat WHERE id > '$lastID' AND groupid = '$groupID'")->fetch_row()[0]; //no need to check
	if ($count > 0)
	{
		$notificationsList[] = array("id" => $groupID, "count" => $count);
	}
}

echo json_encode($notificationsList);

?>