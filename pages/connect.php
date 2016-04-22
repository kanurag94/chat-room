<?php

date_default_timezone_set('Asia/Kolkata');

$db_name = "chatroom";
$mysql_user = "root";
$mysql_password = "";
$server_name = "localhost";
$conn = mysqli_connect($server_name, $mysql_user, $mysql_password, $db_name);

if (!$conn)
{
	echo 'error connecting to database';
}

?>