<?php

session_start();

$name = "Anonymous - ".$_POST["username"];

$_SESSION["id"] = 'anonymous';
$_SESSION["fname"] = $name;
$_SESSION["email"] = 'anonymous' . $name . '@anonymous.com';

setcookie("member", $name, time()+(8000*30), "/"); // expire when browser is closed
header('Location: index.php');

?>