<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>default.html</title>
<style>
.formpanel{
	padding:0;
}
body{
background-color:black;        
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
	<li><a href="SignUp.php"><span class="glyphicon glyphicon-list-alt"></span> Sign Up </a></li>
	</ul>
</div>
</nav>
<br><br><br><br><br><br>
<div class="row">
<div class="col-sm-4 col-xs-1"></div>
<div class="col-sm-4 col-xs-10 formpanel panel panel-default" style="background-color:white"><div class="panel-heading">Login</div><div class="panel-body">
	
	<form class="login-form" action="login_validate.php" method="post">
	<?php 
	session_start();
	if(isset($_SESSION["alert"])){
		echo '<div class="alert alert-warning">'.$_SESSION["alert"].'</div>';
	unset($_SESSION["alert"]);}
	?>
	<div class="form-group">
	<label for="email">E-Mail</label>
	<input class="form-control" id="email" type="text" name="email">
	</div>
	<div class="form-group">
	<label for="password">Password</label>
	<input class="form-control" id="password" type="password" name="password">
	</div>
	<div class="form-group">
	<button class="form-control btn-primary" id="login" type="submit">Login</button>
	</div>
	</form>
</div>
</div>
</div>
</body>
</html>