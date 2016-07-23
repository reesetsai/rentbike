<?php
session_start();
// Connect to server and select databse.
require_once("config.php");

// Connect to server 


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
	// get variables from result.
		$stmt->bind_result($id, $username, $db_password);
		$stmt->fetch();

	if ($stmt->num_rows == 1) {
		$_SESSION['user']         = $username;
		echo "<br>wellcome" . $_SESSION['user'];
	} 
	else {
		echo "login failed";
		}
	}
	if(isset($_SESSION['user'])){
		echo '<meta http-equiv=REFRESH CONTENT=2;url=admin.php>';
	}
	else{
		echo "set session failed";
	}


?>
