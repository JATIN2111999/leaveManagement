<?php

session_start();
include("db_connection.php");

if(isset($_POST['Update']))
{

$userid=$_SESSION['userid'];
$mentor=$_POST['mentor'];
$cc=$_POST['cc'];

$ccc=$_POST['ccc'];
$mentorco=$_POST['mentorco'];
$hod=$_POST['hod'];

$sql = "UPDATE student SET mentor='$mentor', cc='$cc', ccc='$ccc',mentorco='$mentorco',hod='$hod' WHERE userid='$userid'";

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


