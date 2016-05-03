<?php 
session_start();

if(($_COOKIE["member"] == "" &&!isset($_COOKIE["member"]))){
	header('Location: default.php');
}
else if(!isset($_SESSION["id"])){
	header('Location: default.php');
}

require "connect.php";

$userID = $_SESSION['id'];
$query = "SELECT groupid FROM groupmembers WHERE userid = $userID;";

$groupsList = '';
$groupIDS = array();

if($results = $conn->query($query))
{
	while ($row = $results->fetch_row())
	{
		$groupID = $row[0];
		$groupIDS[] = $groupID;
		$name = $conn->query("SELECT name FROM groups WHERE id = $groupID")->fetch_row()[0]; //no need to check  
		$groupsList .= "<li><a href='group.php?id=$groupID'><i class='fa fa-user fa-fw'></i> $name</a></li>";
	}
	
	$results->free();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>chat box</title>
  
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/CB_CSS.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript"> 
		var userName = "<?php echo $_SESSION['fname']; ?>";
		var userID = <?php echo $_SESSION['id']; ?>;
		
		var groupName = "all";
		var groupID = 0;
		var groupList = '<?php echo json_encode($groupIDS); ?>';
	</script>
	
	<script src="../js/chat.js" type="text/javascript"></script>
	
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default " role="navigation" style="margin-bottom: 0">
		
            <div class="navbar-header" style="display:inline-block">
                <a class="navbar-brand" href="index.php">Chat Box</a>
            </div>          

            <ul class="nav navbar-top-links navbar-right" style="float:right;">
                <li class="dropdown">
                    <a class="dropdown" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu " style ="margin-top:0px;"><!--dropdown-message-->
						<li><a href="create-group.php"><i class="fa fa-user fa-fw"></i> Create Group</a></li>
                        <?php echo $groupsList; ?>
                    </ul>
                    <!-- drpdwn-msg -->
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul id="notifications" class="dropdown-menu dropdown-alerts" style ="margin-top:0px;">
                        <li><a href="#"><i class="fa fa-envelope fa-fw"></i> Loading</a></li>
                    </ul>
                    <!-- /.drpdwn-al -->
                </li>
                <!-- drpdwn -->
				
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style ="margin-top:0px;">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
                
            </ul>
          
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- col-lg-12 -->
            </div>
            <!-- row -->
            
            <div class="row">
                <!--- changes coomit-->
                <div class="col-lg-12">
				<!--
                         changes commit 
                    -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown" style ="margin-top:0px;">
                                    
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li class="divider"></li>
									<li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign out!
                                        </a>
                                    </li>
                                </ul>
                            </div>
							<div id="onlineusers" style="margin-top: 10px;">
							  Online Users: Loading
							</div>
                        </div>
                        <!-- panel-hding -->
                        <div id="messagesview" class="panel-body" >
                            <ul class="chat" id="messages">
                            </ul>
                        </div>
                        <!-- panel-body -->
						<form id="submitmessages">
							<div class="panel-footer">
							
								<div class="input-group">
								
					
									<input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
									<span class="input-group-btn">
										<button class="btn btn-warning btn-sm" id="btn-chat" onclick="ajax_post(); return false;">
											Send
										</button>
									</span>
								   
								</div>
							</div>
                         </form>
                        <!-- panel-fotr -->
                    </div>
                    <!-- panel .chat-panel -->
                </div>
				
                <!-- col-lg-4 -->
            </div>
            <!-- row -->
		
			
			
			
        </div>
        <!-- /#page-rapr -->
		
	<footer class="blog-footer"><a href="logout.php">
      <p>Chat box for Chatting by <a href="#"> Chat box team</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    
	
	
    </div>
    <!-- /#rapper -->

</body>

</html>