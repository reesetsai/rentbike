<?php

// Connect to server and select databse.
require_once("config.php");

// Connect to server 

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if($mysqli->connect_error) {
	die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

echo 'DB connect success<br>';

// username and password sent from form 
$username= $_POST["username"];
$user_password= $_POST["password"];

// To protect MySQL injection (more detail about MySQL injection)
if (get_magic_quotes_gpc()) {
	$username = stripslashes($username);
	$user_password = stripslashes($user_password);
	$username = mysql_real_escape_string($username);
	$user_password = mysql_real_escape_string($user_password);
}

/*
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);
*/
echo "Username: $username<br>";
echo "pass: $user_password<br>";	
//MySqli Select Query with prepared statment.
if ($stmt = $mysqli->prepare("SELECT id, username, password FROM members WHERE username = ? and password = ?")) {
	echo 'MySqli select Query';
	$stmt->bind_param('ss', $username, $user_password);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows != 1) {
		echo "The username was not found. Or some errors.";
		$stmt->close();
		$stmt->free_result();
		$mysqli->close();

	} else {
		// get variables from result.
		$stmt->bind_result($id, $username, $db_password);
		if ($stmt->fetch()) {
			echo "<p>id : {$id}, user : {$username} wellcome.</p>";	
		}
		$stmt->close();
		$stmt->free_result();
		$mysqli->close();
	}
}

?>
