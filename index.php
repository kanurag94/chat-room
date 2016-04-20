<html>
<head>
<script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "post-message.php";
    var fn = document.getElementById("first_name").value;
    var ln = document.getElementById("message").value;
	document.getElementById("first_name").value = "";
	document.getElementById("message").value = "";
    var vars = "firstname="+fn+"&message="+ln;
	
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
</script>

<script>

function processRequest(request)
{
	var list = JSON.parse(request.responseText);
	
	var messageDiv = document.getElementById('messages');
	
	//clear old messages
	while ( messageDiv.firstChild )
	{
		messageDiv.removeChild(messageDiv.firstChild);
	}
	
	//append new messages
	for (var i = 0; i < list.length; i++)
	{
		var data = list[i];
		
		var pMessage = document.createElement("p");
		pMessage.appendChild(document.createTextNode(data.name));
		pMessage.appendChild(document.createTextNode(': '));
		pMessage.appendChild(document.createTextNode(data.message));		
		messageDiv.appendChild(pMessage);
	}
	
	//window.scrollTo(0,document.body.scrollHeight);
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
	request.open("GET", "get-message.php", true);
	request.send();
	
	//call this method again
	setTimeout(repeat, 1000);
}

setTimeout(repeat, 1000);

</script>

</head>
<body>
<h2>Chat Room</h2>
First Name: <input id="first_name" name="first_name" type="text">  <br><br>
Message: <input id="message" name="message" type="text"> <br><br>
<input name="myBtn" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>

<div id ="messages">

</div>

</body>
</html>