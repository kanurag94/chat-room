<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
session_start();
$conn=new mysqli("localhost:3306","root","password","chatroom");
$rs=$conn->query("select* from Credentials");
$flag=0;
while($entry=$rs->fetch_assoc())
{
	if($_POST["email"]==$entry["email"]&&$_POST["password"]==$entry["password"])
	{
		$_SESSION["email"]=$entry["email"];
		$_SESSION["password"]=$entry["password"];
		$_SESSION["fname"]=$entry["fname"];
		$_SESSION["lname"]=$entry["lname"];
		$_SESSION["gender"]=$entry["gender"];
		$_SESSION["alert"]="Success";
		header('Location: default.php');
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
</html>