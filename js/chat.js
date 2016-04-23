var MESSAGE_CODE = '<li class="left clearfix">\
	<span class="chat-img pull-left">\
	<!--    <img src="#" alt="User Avatar" class="img-circle" />   -->\
	</span>\
	<div class="chat-body clearfix">\
		<div class="header">\
			<strong class="primary-font">{name}</strong>\
			<small class="pull-right text-muted">\
				<i class="fa fa-clock-o fa-fw"></i> {time}\
			</small>\
		</div>\
		<p>\
			{message}\
		</p>\
	</div>\
</li>';

function ajax_post(){
	// Create our XMLHttpRequest object
	var hr = new XMLHttpRequest();
	// Create some variables we need to send to our PHP file
	var url = "post-message.php";
	//var fn = document.getElementById("btn-name").value;
	var ln = document.getElementById("btn-input").value;
	document.getElementById("btn-input").value = "";
	var vars = "&message="+ln; 
	
	hr.open("POST", url, true);
	// Set content type header information for sending url encoded variables in the request
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Send the data to PHP now... and wait for response to update the status div
	hr.send(vars); // Actually execute the request
}

var lastid = 0;

function processRequest(request)
{
	var list = JSON.parse(request.responseText);
	
	var messageDiv = document.getElementById('messages');
	
	//append new messages
	for (var i = 0; i < list.length; i++)
	{
		var data = list[i];
		
		lastid = data.id;
		
		var message_str = MESSAGE_CODE;
		message_str = message_str.replace("{time}", data.time);
		message_str = message_str.replace("{name}", data.name);
		message_str = message_str.replace("{message}", data.message);
		
		messageDiv.insertAdjacentHTML("beforeend", message_str);
	}
	
	//scroll to bottom on new messages
	if (list.length > 0)
	{
		var divScroll = document.getElementById("messagesview");
		divScroll.scrollTop = divScroll.scrollHeight;
	}
}

function repeat()
{
	var request = new XMLHttpRequest();
	request.onreadystatechange = function()
	{
		if (request.readyState == 4 && request.status == 200)
		{
			processRequest(request);
		}
	};
	request.open("GET", "get-message.php?lastid=" + lastid, true);
	request.send();
	
	//call this method again
	setTimeout(repeat, 1000);	
}

setTimeout(repeat, 1000);
