<?php

require "connect.php";
session_start();

$email=$_POST["email"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$gender=$_POST["gender"];
$password=$_POST["password"];
$confirmpassword=$_POST["confirmpassword"];
if($email==""||$fname==""||$lname==""||$gender==""||$password==""||$confirmpassword=="")
{
    $_SESSION["alert"]="All fields are mandatory !";
    header('Location: SignUp.php');
}
else if($password!=$confirmpassword)
{
    $_SESSION["alert"]="Passwords don't match !";
    header('Location: SignUp.php');
}
else
{
    
    $rs=$conn->query("select * from credentials");
    $flag=1;
    while($entry=$rs->fetch_assoc())
    {
        if($entry["email"]==$email)
        {
            $flag=0;
            $_SESSION["alert"]="Email already in use !";
            header('Location: SignUp.php');
            break;
        }
    }
    if($flag==1)
    {
        $conn->query("insert into credentials(email,fname,lname,gender,password) values('$email','$fname','$lname','$gender','$password')");
        $_SESSION["email"]=$email;
        $_SESSION["fname"]=$fname;
        $_SESSION["lname"]=$lname;
        $_SESSION["gender"]=$gender;
        $_SESSION["password"]=$password;
        $_SESSION["alert"]="Success";
        header('Location: default.php');
    }
    $conn->close();
}
?>