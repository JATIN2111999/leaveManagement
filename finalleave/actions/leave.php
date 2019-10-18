<?php

session_start();
include("db_connection.php");
$imgsucc="0";

if(isset($_POST['leave']))
{
    if (isset($_POST['bot'])) {

        function getimg($url) {         
    $headers[] = 'Accept: image/gif, image/png, image/x-bitmap, image/jpeg, image/pjpeg';              
    $headers[] = 'Connection: Keep-Alive';         
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
    $user_agent = 'php';         
    $process = curl_init($url);         
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);         
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here         
    curl_setopt($process, CURLOPT_TIMEOUT, 30);         
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
    $return = curl_exec($process);         
    curl_close($process);         
    return $return;     
} 


$img = $_POST['url']; 
$imagename= basename($img);
$image = getimg($img); 
file_put_contents('img/'.$imagename,$image);  
$imgsucc="1";
$userid=$_POST['userid'];

    }
    else{
$userid=$_SESSION['userid'];

$target= "img/".basename($_FILES['img']['name']);
$imagename=$_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], $target);
$imgsucc="1";
}   
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

$sql = "INSERT INTO appl(rollno, reason, otherr, days, cc, mentor, ccc, mentorco, hod, dep, img) VALUES( '$userid', '$reason','$otherr', '$days', '$cc','$mentor', '$ccc', '$mentorco', '$hod', '$dep', '$imagename')";

if(mysqli_query($conn,$sql) && $imgsucc=="1")
{
    echo "1";
echo "<script>alert('Success')</script><script>window.open('../student/home.php','_self')</script>";
}
else
{
    echo mysqli_error($conn);
}
}
?>


