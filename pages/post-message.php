<?php 

require "connect.php";

$first_name = $_COOKIE["member"];
$message = $_POST["message"];
$groupID = $_POST["group"];
$timestamp = date("Y-m-d H:i:s");

$imageExtensions = array("gif", "jpg", "jpeg", "png");
$urlExtension = pathinfo($message, PATHINFO_EXTENSION);
if (in_array($urlExtension, $imageExtensions) && filter_var($message, FILTER_VALIDATE_URL))
{
	//if is image
	$message = "<img src='$message' /><br />$message</a>";
}
else
{
	//replace all matching urls to linking urls a href tags
	$message = preg_replace("/((https?:\/\/)([\da-z\.-]+)\.([a-z\.]{2,6})([A-Za-z0-9-._~:\/\?#\[\]@!$&'()*\+,;=]*)*)/", '<a href="$1">$1</a>', $message);
}

$message = mysqli_real_escape_string($conn, $message);

$mysql_qry = "INSERT INTO chat(name,message,time,groupid) VALUES ('$first_name','$message', '$timestamp', $groupID)";

if($conn->query($mysql_qry)===TRUE){
	echo "";
}
else{
	echo "error"."<br>"."$conn->error";
}

$conn->close();

?>
