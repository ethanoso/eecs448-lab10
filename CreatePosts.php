<?php
$user = $_POST['user'];
$post = $_POST['post'];

if($post == "") {echo "Unsaved: Post has no content";}
else{
	//Setup connection
	$mysqli = new mysqli("mysql.eecs.ku.edu", "e259o067", "aip4eaT3", "e259o067");
	if($mysqli->connect_error) {die("Connection failed: " . $mysqli->connect_error);}

	//Check if the user already exists
	$check = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '$user'");
	if($check->num_rows == 0){
		echo "Unsaved: User does not exist";
	}
	else{
		//create the post and report its status
		$query = "INSERT INTO Posts (content, author_id) VALUES ('$post', '$user')";
		if($mysqli->query($query)) {echo "Post saved";}
		else{echo "Error: " . $query . "<br>" . $mysqli->error;}
	}
	$mysqli->close();
}
?>