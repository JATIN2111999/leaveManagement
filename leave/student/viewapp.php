<?php
session_start();
if(!$_SESSION['userid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

 include("../actions/db_connection.php");

$userid=$_SESSION['userid'];
$sql = "SELECT * FROM appl WHERE rollno='$userid' ";
$showtables= mysqli_query($conn, $sql);
// $result = mysqli_query($conn,"select count(1) FROM abhi") or die("Error: " . mysqli_error($conn));
// $row1 = mysqli_fetch_array($result);
// $total1 = $row1[0];
function status($n){
  if ($n=="" || $n == "0") {
    $status="Pending";

  }
  if ($n=="1") {
    $status="Rejected";
  }
  if ($n=="2") {
    $status="Approved";
  }
  return $status;
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

<table><tr>
    <th> Sr. No.</th>
    <th> Reason</th>
    <th> Other Reason</th>
    <th> Days</th>
    <th> CC</th>

    <th> CCC</th>

    <th> Mentor</th>
    <th> Mentor Co</th>
    <th> HOD</th>
    </tr>
<?php

                        while($table = mysqli_fetch_array($showtables))
                        { 
                          if ($table['days'] == "1") {
                          echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['otherr']."</td>");
                          echo ("<td>".$table['days']."</td>");
                          echo ("<td>".status($table['ccst'])."</td>");
                          echo ("<td>-</td>");
                          echo ("<td>".status($table['mentorst'])."</td>");
                          echo ("<td>-</td>");
                          echo ("<td>-</td>");
                           echo "</tr>";
                        }
                        if ($table['days'] == "3") {
                          echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['otherr']."</td>");
                          echo ("<td>".$table['days']."</td>");
                          echo ("<td>".status($table['ccst'])."</td>");
                          echo ("<td>".status($table['cccst'])."</td>");
                          echo ("<td>".status($table['mentorst'])."</td>");
                          echo ("<td>-</td>");
                          echo ("<td>-</td>");
                           echo "</tr>";
                        }
                        if ($table['days'] == "4") {
                          echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['otherr']."</td>");
                          echo ("<td>3-5</td>");
                          echo ("<td>".status($table['ccst'])."</td>");
                          echo ("<td>-</td>");
                          echo ("<td>".status($table['mentorst'])."</td>");
                          echo ("<td>".status($table['mentorcost'])."</td>");
                          echo ("<td>-</td>");
                           echo "</tr>";
                        }
                        if ($table['days'] == "6") {
                          echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['otherr']."</td>");
                          echo ("<td>More than 5</td>");
                          echo ("<td>".status($table['ccst'])."</td>");
                          echo ("<td>-</td>");
                          echo ("<td>".status($table['mentorst'])."</td>");
                          echo ("<td>-</td>");
                          echo ("<td>".status($table['hodst'])."</td>");
                           echo "</tr>";
                        }




                      }
                        ?>
</table>
</body>
</html>