<html>
<head>
<script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "my_parse_file.php";
    var fn = document.getElementById("first_name").value;
    var ln = document.getElementById("message").value;
	document.getElementById("first_name").value = "";
	document.getElementById("message").value = "";
    var vars = "firstname="+fn+"&message="+ln;
	var div = document.createElement("div");
	
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			div.innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
	
div.style.width = "200px";
div.style.height = "25px";
div.style.marginTop = "3px"
div.style.background = "red";
div.style.color = "white";
div.innerHTML = "processing...";

document.body.appendChild(div);

}
</script>
</head>
<body>
<h2>Chat Room</h2>
First Name: <input id="first_name" name="first_name" type="text">  <br><br>
Message: <input id="message" name="message" type="text"> <br><br>
<input name="myBtn" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>
<div id ="status"></div>
</body>
</html>