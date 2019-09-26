<?php
session_start();
if(!$_SESSION['userid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

include("../actions/db_connection.php");
$userid=$_SESSION['userid'];
// echo "$userid";

// For Getting Studends Department
$sql="SELECT * FROM student WHERE userid='$userid' ";
$result = mysqli_query($conn,$sql) or die("Error: " . mysqli_error($conn));
$row = $result->fetch_array();
echo "$row[dep]";

// Fetch All Faculty from Department (Mentor)
$sql1 = "SELECT * FROM faculty WHERE dep='$row[dep]' AND position='mentor'";
$showtables1= mysqli_query($conn, $sql1);
// Fetch All Faculty from Department (CC)
$sql2 = "SELECT * FROM faculty WHERE dep='$row[dep]' AND position='cc'";
$showtables2= mysqli_query($conn, $sql2);
// Fetch All Faculty from Department (CCC)
$sql3 = "SELECT * FROM faculty WHERE dep='$row[dep]' AND position='ccc'";
$showtables3= mysqli_query($conn, $sql3);
// Fetch All Faculty from Department (MentoCo)
$sql4 = "SELECT * FROM faculty WHERE dep='$row[dep]' AND position='mentorco'";
$showtables4= mysqli_query($conn, $sql4);
// Fetch All Faculty from Department (hod)
$sql5 = "SELECT * FROM faculty WHERE dep='$row[dep]' AND position='hod'";
$showtables5= mysqli_query($conn, $sql5);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
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
         <form  method="post" action="../actions/update.php" >
  <label ><b>Select Mentor</b></label>
  <select id="mentor" name="mentor">
   
                        <?php
                        while($table1 = mysqli_fetch_array($showtables1))
                        { 
                         
                          echo "<option value='".$table1['userid']."'>";
                          echo "$table1[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    <br> 
    <label ><b>Select CC</b></label>
  <select id="cc" name="cc">
   
                        <?php
                        while($table2 = mysqli_fetch_array($showtables2))
                        { 
                         
                          echo "<option value='".$table2['userid']."'>";
                          echo "$table2[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    <br><label ><b>Select CCC</b></label>
  <select id="ccc" name="ccc">
   
                        <?php
                        while($table3 = mysqli_fetch_array($showtables3))
                        { 
                         
                          echo "<option value='".$table3['userid']."'>";
                          echo "$table3[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    <br>
    <label ><b>Select Mentor Co</b></label>
  <select id="mentorco" name="mentorco">
   
                        <?php
                        while($table4 = mysqli_fetch_array($showtables4))
                        { 
                         
                          echo "<option value='".$table4['userid']."'>";
                          echo "$table4[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    <br>
    <label ><b>Select HOD</b></label>
  <select id="hod" name="hod">
   
                        <?php
                        while($table5 = mysqli_fetch_array($showtables5))
                        { 
                         
                          echo "<option value='".$table5['userid']."'>";
                          echo "$table5[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    <br>
    <br>
    <button type="submit" name="Update" value="Update" >Update</button>
    </form>
</body>
</html>