<?php
$user = $_POST['user'];
if($user == "") {echo "Error: No username input";}
else{
	//Setup connection
	$mysqli = new mysqli("mysql.eecs.ku.edu", "e259o067", "aip4eaT3", "e259o067");
	if($mysqli->connect_error) {die("Connection failed: " . $mysqli->connect_error);}

	//Check if the user already exists
	$check = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '$user'");
	if($check->num_rows == 0){
		//create the record and report its status
		$query = "INSERT INTO Users (user_id) VALUES ('$user')";
		if($mysqli->query($query)) {echo "New user created successfully";}
		else{echo "Error: " . $query . "<br>" . $mysqli->error;}
	}
	else{echo "Error: User already exists";}
	$mysqli->close();
}
?>