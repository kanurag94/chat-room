<?php 

require "connect.php";

$first_name = $_POST["firstname"];
$message = $_POST["message"];
$time = time();

echo $first_name . ' - ' . $message ;

$mysql_qry = "insert into chat(name,message,time) values ('$first_name','$message','$time')";

if($conn->query($mysql_qry)===TRUE){
	echo "";
}
else{
	echo "error"."<br>"."$conn->error";
}

$conn->close();

?>