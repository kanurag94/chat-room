<?php

$db_name = "database name";
$mysql_user = "username";
$mysql_password = "password";
$server_name = "localhost";
$conn = mysqli_connect($server_name, $mysql_user, $mysql_password, $db_name);

if (!$conn)
{
	echo 'error connecting to database';
}

?>