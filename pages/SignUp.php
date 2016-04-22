<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>default.html</title>
<style>
body{
	background-color:black;
}
    .formpanel{
        padding:0;
    }
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
	<div class="navbar-header">
		<div class="navbar-brand" href="#"><span class="glyphicon glyphicon-phone"></span> ChatRoom</div>
	</div>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="default.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
	</ul>
</div>
</nav>
<br><br><br><br><br><br>
<div class="row">
<div class="col-sm-4 col-xs-1"></div>
<div class="col-sm-4 col-xs-10 formpanel panel panel-default" >
<div class="panel-heading">Sign Up</div>
<div class="panel-body">
<form action="process_signup.php" method="post">
<?php
    session_start();
    if(isset($_SESSION["alert"]))
    {
        echo '<div class="alert alert-warning">'.$_SESSION["alert"].'</div>';
        unset($_SESSION["alert"]);
    }
?>
<div class="row">
<div class="form-group col-sm-6">
<label for="fname"> First Name : </label>
<input type="text" class="form-control" name="fname">
</div>
<div class="form-group col-sm-6">
<label for="lname"> Last Name : </label>
<input type="text" class="form-control" name="lname">
</div>
</div>
<div class="row">
<div class="form-group col-sm-6">
    <label for="email">E-mail:</label>
    <input type="email" class="form-control" name="email">
</div>
<div class="form-group col-sm-6">
  <label for="gender">Gender:</label>
  <select class="form-control" name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
    <option value="*">Refuse to Answer</option>
  </select>
</div>
</div>
<div class="row">
<div class="form-group col-sm-6">
<label for="pwd">Password: </label>
<input type="password" class="form-control" name="password">
</div>
<div class="form-group col-sm-6">
<label for="confirmpassword">Confirm Password: </label>
<input type="password" class="form-control" name="confirmpassword">
</div>
</div>
<input class="btn btn-primary col-sm-12 btn-large" type="submit" value="Submit">
</form>
</div>
</div>
</div>
</body>
</html>