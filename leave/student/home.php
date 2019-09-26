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
<a href="edit.php">Edit Profile</a>
<br>
<a href="viewapp.php">View Application</a>

<br><br><br><br><br><br><br><br><br><br>

         <form  method="post" action="../actions/leave.php" >
  <label ><b>Leave Reason</b></label>
 <select id="reason" name="reason">
 	<option value="medical">Medical</option>
 	<option value="committee">Committee</option>
 	<option value="emergency"> Emergency</option>
 	<option value="other">Other</option>
 </select><br>
    <input type="text" placeholder="Other Reason" name="otherr" >
<br><br>
    <label ><b>No. of Days</b></label>
    <select id="days" name="days">
    	<option value="1">1 Day</option>
    	<option value="3">3 Days</option>
    	<option value="4">3-5 Days</option>
    	<option value="6">More Than 5 Days</option>
    </select>
    <br>
    <br>
    <button type="submit" name="leave" value="leave" >Submit</button>
</form>
</body>
</html>