<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>chat box</title>
  
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/CB_CSS.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="../js/chat.js" type="text/javascript"></script>
</head>

<body>
	

	<?php 
	
	//unset($_COOKIE["member"]);
	
if(($_COOKIE["member"] == "")){
header('Location: default.php');
}
?>

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
                    <ul class="dropdown-menu "><!--dropdown-message-->
                        
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Member 1</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>some messge about a topic from member 1</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Member 2</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Some message about a topic from member 2</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- drpdwn-msg -->
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">1 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">1 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.drpdwn-al -->
                </li>
                <!-- drpdwn -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <ul class="dropdown-menu slidedown">
                                    
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
	
	
	<footer class="blog-footer">
      <p>Chat box for Chatting by <a href="#"> Chat box team</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    
	
	
    </div>
    <!-- /#rapper -->

</body>

</html>