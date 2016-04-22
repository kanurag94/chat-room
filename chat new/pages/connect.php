<?php

$db_name = "techspac_chat_room";
$mysql_user = "techspac_piyush";
$mysql_password = "piyush1234";
$server_name = "localhost";
$conn = mysqli_connect($server_name, $mysql_user, $mysql_password, $db_name);

if (!$conn)
{
	echo 'error connecting to database';
}

?>