<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	body {
		text-shadow: 0px 0px 1px rgba(0, 0, 0, .4);
	}
</style>
<meta charset ="utf-8">
<title> login </title>
</head>

<body>
	<div id="home">
	<b id="welcome">Welcome : <i><?php echo $_SESSION['user']; ?> </i></b>
	<b id="logout"><a href="logout.php">[ 登出 ]</a></b>

</body>
</html>
