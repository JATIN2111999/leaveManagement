<?php

session_start();
include("db_connection.php");

if(isset($_POST['Update']))
{

$userid=$_SESSION['userid'];
$mentor=$_POST['mentor'];
$cc=$_POST['cc'];

$sql = "UPDATE student SET mentor='$mentor', cc='$cc' WHERE userid='$userid'";

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


