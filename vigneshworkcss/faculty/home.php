<?php
session_start();
if(!$_SESSION['userid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Home</title>
</head>
<body>
<a href="logout.php">Logout</a>
<br>
<a href="home.php">Home</a>
<br>
<a href="pending.php">
<label>Pending()</label></a>
</body>
</html>