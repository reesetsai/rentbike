<?php
// Connect to server and select databse.
require_once("configform.php");
ini_set('display_errors', '1');

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if($mysqli->connect_error) {
	die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

echo 'DB connect success<br>';

$username= $_POST["username"];
$id1= $_POST["ide"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$donateInfo_City= $_POST["donateInfo_City"];
$donateInfo_Division= $_POST["donateInfo_Division"];
$donateInfo_RecAddress= $_POST["donateInfo_RecAddress"];
$where1= $_POST["where1"];
echo '<pre>',print_r($_POST),'</pre>';
// Insert form to table
$query = "INSERT INTO formdask (username, id1, phone, donateInfo_City, donateInfo_Division, donateInfo_RecAddress, where1,email)
 VALUES('$username','$id1','$phone','$donateInfo_City','$donateInfo_Division',
 		'$donateInfo_RecAddress','$where1','$email')";
echo "$query<br>";

$result = $mysqli->query($query);
if ($result) {
	
	echo 'Thank you<br>';
} else {
	echo("Input data is fail<br>");
}

echo "You original db construct<br>";
$table_construct = $mysqli->query("SHOW CREATE TABLE formdask");
$crlf = (IS_WIN ? "\r\n" : "\n");
$create = $table_construct->fetch_array(MYSQLI_NUM);
$tabledump = $create[1];

echo "$tabledump<br>";

// send mail to user
$query = "SELECT email FROM formdask";
$result = $mysqli->query($query);
echo "$row<br>";

if($row = 1){ 
	$msg = "this is a test.\n";
	$TO = $row["email"];
	$Form = 'u5431269@gmail.com';
	mail( $TO, $msg, 'From:' . $Form);
	echo 'Send to: ' . $TO . '<br>';
}
else{
	echo "there is something wrong";
}


$mysqli->close();


?>