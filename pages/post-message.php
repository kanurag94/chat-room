<?php 

require "connect.php";

$first_name = $_COOKIE["member"];

$message = $_POST["message"];
$timestamp = date("Y-m-d H:i:s");

$imageExtensions = array("gif", "jpg", "jpeg", "png");
$urlExtension = pathinfo($message, PATHINFO_EXTENSION);
if (in_array($urlExtension, $imageExtensions))
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

$mysql_qry = "insert into chat(name,message,time) values ('$first_name','$message', '$timestamp')";

if($conn->query($mysql_qry)===TRUE){
	echo "";
}
else{
	echo "error"."<br>"."$conn->error";
}

$conn->close();

?>