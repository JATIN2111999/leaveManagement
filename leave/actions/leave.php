<?php

session_start();
include("db_connection.php");

if(isset($_POST['leave']))
{
	$userid=$_SESSION['userid'];
	$reason=$_POST['reason'];
$otherr=$_POST['otherr'];
$days=$_POST['days'];

	$sql1="SELECT * FROM student WHERE userid='$userid' ";
$result1 = mysqli_query($conn,$sql1) or die("Error: " . mysqli_error($conn));
$row1 = $result1->fetch_array();

$cc=$row1['cc'];
$ccc=$row1['ccc'];
$mentorco=$row1['mentorco'];
$hod=$row1['hod'];
$mentor=$row1['mentor'];
$dep=$row1['dep'];

$sql = "INSERT INTO appl(rollno, reason, otherr, days, cc, mentor, ccc, mentorco, hod, dep) VALUES( '$userid', '$reason','$otherr', '$days', '$cc','$mentor', '$ccc', '$mentorco', '$hod', '$dep')";


if(mysqli_query($conn,$sql))
{
echo "<script>alert('Success')</script><script>window.open('../student/home.php','_self')</script>";

}
else
{
	echo mysqli_error($conn);
}
}

?>


