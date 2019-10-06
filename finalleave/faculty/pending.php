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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
    .img {
      text-align: center;
      height: 15%;
    }

    #tab1 {
      border: 2px solid black;
    }

    #tab1 td {
      width: 150px;
      text-align: center;
      border: 2px solid black;
      padding: 10px;

    }

    .logout {
      position: absolute;
      top: 2%;
      right: 3%;
    }

  </style>

</head>
<body>

<div class="img">
    <img src="logo1.png" class="img-fluid"> <br><br><br>
  </div>
  <div class="par">
    <div class="logout" class="col-md-4 col-lg-2">
<a href="logout.php" class="btn btn-info btn-lg">
          Log out
        </a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table" id="tab1">
      <!-- <div class="th1"> -->
      <tbody>
        <tr style="background-color:#ebebe0">
          <td><a href="home.php"><b>Home</b></a></td>
          <td><a href="pending.php"><b>pending</b></a></td>
        </tr>
      </tbody>
      <!-- </div> -->
    </table>
  </div>
<table class="table table-striped table-bordered table-hover table-responsive-md" id="tab2">
    <thead class="thead table table-primary">
      <tr>
        <th scope="col" style="text-align:center;"> Sr. No.</th>
        <th scope="col" style="text-align:center;"> Roll No.</th>
        <th scope="col" style="text-align:center;"> Reason</th>
        <th scope="col" style="text-align:center;"> Days</th>
        <th scope="col" style="text-align:center;"> Take Action</th>
      </tr>
    </thead>



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