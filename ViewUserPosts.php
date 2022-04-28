<?php
$user = $_POST['user'];
//Create/Test connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "e259o067", "aip4eaT3", "e259o067");
if($mysqli->connect_error) {die("Connection failed: " . $mysqli->connect_error);}
//selects the users from the database
$query = $mysqli->query("SELECT * FROM Posts WHERE author_id='$user'");
//checks if there are users
if ($query->num_rows > 0) {
	// output data of each row
	echo "<style>table, th, td {border: 1px solid black;}</style>";
	echo "<table><th>Post ID</th><th>Content</th><th>Author</th>";
	while($row = $query->fetch_array()) {
		echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row['content'] . "</td><td>" . $row['author_id'] . "</td></tr>";
	}
	echo "</table>";
	$query->free();
}else {echo "0 posts";}

$mysqli->close();

?>