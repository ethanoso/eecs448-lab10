<?php
//Create/Test connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "e259o067", "aip4eaT3", "e259o067");
if($mysqli->connect_error) {die("Connection failed: " . $mysqli->connect_error);}
//selects the users from the database
$query = $mysqli->query("SELECT user_id FROM Users");
//checks if there are users
if ($query->num_rows > 0) {
	// output data of each row
	echo "<style>table, th, td {border: 1px solid black;}</style>";
	echo "<table><th>Users</th>";
	while($row = $query->fetch_array()) {
		echo "<tr><td>" . $row["user_id"] . "</td></tr>";
	}
	echo "</table>";
	$query->free();
}else {echo "0 users";}

$mysqli->close();
?>
