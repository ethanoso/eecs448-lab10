<?php
$posts = $_POST['post'];
foreach ($posts as $post=>$value) {
	//Create/Test connection
	$mysqli = new mysqli("mysql.eecs.ku.edu", "e259o067", "aip4eaT3", "e259o067");
	if($mysqli->connect_error) {die("Connection failed: " . $mysqli->connect_error);}
	//deletes posts
	if ($mysqli->query("DELETE FROM Posts WHERE post_id=$value;")) {
		echo "Deleted Post ID: ".$value."</br>";
	}else {echo "Failed to delete";}
	$mysqli->close();
}
?>