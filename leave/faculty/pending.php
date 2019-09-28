<?php
session_start();
if(!$_SESSION['userid'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

 include("../actions/db_connection.php");

$userid=$_SESSION['userid'];

$sql1="SELECT * FROM faculty WHERE userid='$userid' ";
$result1 = mysqli_query($conn,$sql1) or die("Error: " . mysqli_error($conn));
$row1 = $result1->fetch_array();
echo "$row1[position]";


$sql = "SELECT * FROM appl WHERE $row1[position]='$userid' ";
$showtables= mysqli_query($conn, $sql);
// $result = mysqli_query($conn,"select count(1) FROM abhi") or die("Error: " . mysqli_error($conn));
// $row1 = mysqli_fetch_array($result);
// $total1 = $row1[0];


//bootstrap dal
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

<br><br><br><br><br><br><br><br><br><br>

<table><tr>
    <th> Sr. No.</th>
    <th> Roll No.</th>
    <th> Reason</th>
    <th> Days</th>
    <th> Take Action</th>
    </tr>
<?php
					if ( $row1['position'] == "cc" || $row1['position'] == "mentor" ) {
            while($table = mysqli_fetch_array($showtables))
                        { 
                          if ($table['ccst'] =="0") {
                            # code...
                          
                          echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['rollno']."</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['days']."</td>");
                         echo "<td>";
                          echo "<a href='takeaction.php?sr=".$table['sr']."&rollno=".$table['rollno']."'>Take Action </a>";
                          echo "</td>";
                           echo "</tr>";
                        }
                      }
          }
          if ( $row1['position'] == "mentor" ) {
            while($table = mysqli_fetch_array($showtables))
                        { 
                          if ($table['mentorst'] =="0") {
                            # code...
                          
                          echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['rollno']."</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['days']."</td>");
                         echo "<td>";
                          echo "<a href='takeaction.php?sr=".$table['sr']."&rollno=".$table['rollno']."'>Take Action </a>";
                          echo "</td>";
                           echo "</tr>";
                        }
                      }
          }
                        
         
					 if ( $row1['position'] == "mentorco" ) {                     	
                        		while($table = mysqli_fetch_array($showtables))
                        { 
                        	if ( $table['days'] == "4" && $table['mentorcost'] =="0" ) {
                        	echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['rollno']."</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['days']."</td>");
                         echo "<td>";
                         echo "<a href='takeaction.php?sr=".$table['sr']."&rollno=".$table['rollno']."'>Take Action </a>";
                         echo "</td>";
                           echo "</tr>";
                        }
                        	}						
					}
                         if ( $row1['position'] == "ccc" ) {                     	
                        		while($table = mysqli_fetch_array($showtables))
                        { 
                        	if ( $table['days'] == "3") {
                        	echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['rollno']."</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['days']."</td>");
                         echo "<td>";
                         echo "<a href='takeaction.php?sr=".$table['sr']."&rollno=".$table['rollno']."'>Take Action </a>";
                         echo "</td>";
                           echo "</tr>";
                        }
                        	}						
					}
                        
                          if ( $row1['position'] == "hod" ) {                     	
                        		while($table = mysqli_fetch_array($showtables))
                        { 
                        	if ( $table['days'] == "6") {
                        	echo '<tr >';
                          echo ("<td>1</td>");
                          echo ("<td>".$table['rollno']."</td>");
                          echo ("<td>".$table['reason']."</td>");
                          echo ("<td>".$table['days']."</td>");
                         echo "<td>";
                         echo "<a href='takeaction.php?sr=".$table['sr']."&rollno=".$table['rollno']."'>Take Action </a>";
                         echo "</td>";
                           echo "</tr>";
                        }
                        	}						
					}
                        

                        ?>
</table>
</body>
</html>