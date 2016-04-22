<?php 

require "connect.php";

date_default_timezone_set('Asia/Kolkata');

$first_name = $_POST["firstname"];
$message = $_POST["message"];
$timestamp = date("Y-m-d H:i:s");

echo $first_name . ' - ' . $message ;

$mysql_qry = "insert into chat(name,message,time) values ('$first_name','$message', '$timestamp')";

if($conn->query($mysql_qry)===TRUE){
	echo "";
}
else{
	echo "error"."<br>"."$conn->error";
}

$conn->close();

?>