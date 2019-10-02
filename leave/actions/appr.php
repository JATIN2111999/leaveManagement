<?php

session_start();
include("db_connection.php");



$userid=$_SESSION['userid'];
$sr=$_GET['sr'];
$position=$_GET['position'];
$dep=$_GET['dep'];


//cc
if ($position=="cc") {
$sql = "UPDATE appl SET ccst='2' WHERE sr='$sr' ";
if(mysqli_query($conn,$sql))
{
echo "<script>alert('Approved Successfully')</script><script>window.open('../faculty/home.php','_self')</script>";
}
else
{
	echo mysqli_error($conn);
}
}
//ccc
if ($position=="ccc") {
$sql = "UPDATE appl SET cccst='2' WHERE sr='$sr' ";
if(mysqli_query($conn,$sql))
{
echo "<script>alert('Approved Successfully')</script><script>window.open('../faculty/home.php','_self')</script>";
}
else
{
	echo mysqli_error($conn);
}
}


if ($position=="mentor") {
$sql = "UPDATE appl SET mentorst='2' WHERE sr='$sr' ";
if(mysqli_query($conn,$sql))
{
echo "<script>alert('Approved Successfully')</script><script>window.open('../faculty/home.php','_self')</script>";
}
else
{
	echo mysqli_error($conn);
}
}


if ($position=="mentorco") {
$sql = "UPDATE appl SET mentorcost='2' WHERE sr='$sr' ";
if(mysqli_query($conn,$sql))
{
echo "<script>alert('Approved Successfully')</script><script>window.open('../faculty/home.php','_self')</script>";
}
else
{
	echo mysqli_error($conn);
}
}


if ($position=="hod") {
$sql = "UPDATE appl SET hodst='2' WHERE sr='$sr' ";
if(mysqli_query($conn,$sql))
{
echo "<script>alert('Approved Successfully')</script><script>window.open('../faculty/home.php','_self')</script>";

}
else
{
	echo mysqli_error($conn);
}
}


?>


