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
	<title>Assign Mentor to Student</title>
</head>
<body>

<a href="logout.php">Logout</a>
<br>
</body>
</html>