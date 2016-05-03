<?php
session_start();
require 'connect.php';

$groupid = $_POST['groupid'];
$lastid = $_POST['lastid'];
$id = $_SESSION['id'];

$mysql_qry = "UPDATE `groupmembers` SET `lastid`= '$lastid' WHERE userid = '$id' AND groupid = '$groupid';";

if($conn->query($mysql_qry)===TRUE){
	echo "";
}
else{
	echo "error"."<br>"."$conn->error";
}

$conn->close();



?>