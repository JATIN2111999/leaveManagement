<?php
session_start();
if(!$_SESSION['userid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

 include("../actions/db_connection.php");


$userid=$_SESSION['userid'];


$sr=$_GET["sr"];
$rollno = $_GET["rollno"];

$sql1="SELECT * FROM student WHERE userid='$rollno' ";
$result1 = mysqli_query($conn,$sql1) or die("Error: " . mysqli_error($conn));
$row1 = $result1->fetch_array();



$sql = "SELECT * FROM appl WHERE sr='$sr' ";
$result = mysqli_query($conn,$sql) or die("Error: " . mysqli_error($conn));
$row = $result->fetch_array();


$sql2 = "SELECT * FROM faculty WHERE userid='$userid' ";
$result2 = mysqli_query($conn,$sql2) or die("Error: " . mysqli_error($conn));
$row2 = $result2->fetch_array();

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

<br><br><br><br><br>

<h2>
  Student Info
</h2>
Student Name:<?php echo "$row1[name]"; ?>
<br>
Student Roll No.:<?php echo "$row1[userid]"; ?>
<br>
Department :<?php echo "$row1[dep]"; ?>
<br>
Sem :
<br>
Mob No. :<?php echo "$row1[mob]"; ?>
<br>
Parent Mob :<?php echo "$row1[parmob]"; ?>
<br>
<h2>
  Leave Application
</h2>
Reason :<?php echo "$row[reason]"; ?>
<br>
Days :<?php echo "$row[days]"; ?>
<br>
Other :<?php echo "$row[otherr]"; ?>
<br>

<?php 

                          echo "<a href='../actions/appr.php?sr=".$sr."&position=".$row2['position']."&dep=".$row['dep']."'>Approve </a>";
                          echo "<a href='../actions/rej.php?sr=".$sr."&position=".$row2['position']."&dep=".$row['dep']."'>Reject </a>";
?>

<br>
</table>
</body>
</html>