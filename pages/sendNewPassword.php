<?php
session_start();
$conn= new mysqli("localhost","957862","password","957862");
$rs=$conn->query("select * from Credentials");
$flag=0;
while($entry=$rs->fetch_assoc())
{
    if($entry["email"]==$_GET["email"])
        $flag=1;
}
if($flag)
{   
        $to=$_GET["email"];
        $subject="test1";
        $newpass=substr(str_shuffle("!@#$%^&*1234567890?)"),0,3).substr(str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM"),0,4);
        $msg="Hi,\n\nThe new password for your account at ChatBox is\n\n".$newpass."\n\nUse this to login and reset the password!";
        $headers="From: meetsid20@gmail@gmail.com";
        mail($to,$subject,$msg,$headers);
        $_SESSION["alert"]="Success";
        header('Location: default.php');
}
else
{
    $_SESSION["alert"]="Email is not registered !";
    header('Location: forgot_password.php');
}
?>