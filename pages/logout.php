<?php
setcookie("member","",time()-3600, "/");
unset($_COOKIE["member"]);
header('Location: default.php');
?>