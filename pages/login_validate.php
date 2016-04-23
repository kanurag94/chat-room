<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
session_start();
require 'connect.php';
$rs=$conn->query("select* from credentials");
$flag=0;
while($entry=$rs->fetch_assoc())
{
	if($_POST["email"]==$entry["email"]&&$_POST["password"]==$entry["password"])
	{
		$_SESSION["id"]=$entry["id"];
		$_SESSION["email"]=$entry["email"];
		$_SESSION["password"]=$entry["password"];
		$_SESSION["fname"]=$entry["fname"];
		$_SESSION["lname"]=$entry["lname"];
		$_SESSION["gender"]=$entry["gender"];
		$_SESSION["alert"]="Success";
		
		$cookie_name = "member";
		$cookie_value =$_SESSION["fname"];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header('Location: index.php');
		$flag=1;		
	}
}
if($flag==0)
{
	$_SESSION["alert"]="Wrong Email or Password!";
	header('Location: default.php');
}
$conn->close();
?>
</body>
</html