<?php

session_start();

$cookie_value = "Anonymous ".$_POST["username"];
$cookie_name = "member";		
		setcookie($cookie_name, $cookie_value, time()+(8000*30), "/"); // expire when browser is closed
		header('Location: index.php');

?>