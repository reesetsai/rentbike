<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<title> login </title>
</head>

<body>
		<div id="home">
		<b id="welcome">Welcome : <i><?php echo $_SESSION['user']; ?> </i></b>
		<b id="logout"><a href=""></a></b>

</body>
</html>
