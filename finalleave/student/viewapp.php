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

function status($n){

  if ($n=="1") {
    $status="Rejected";
  }
  if ($n=="2") {
    $status="Approved";
  }
  else {
    $status="Pending";
  }
  return $status;
}

?>
<!DOCTYPE html>
<html>
<!-- <a href="logout.php">Logout</a> -->

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Welcome Home</title>
  <style>
    .img {
      text-align: center;
      height: 50%;
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

    /* .par{
      position:relative;
    } */
    .logout {
      position: absolute;
      top: 2%;
      right: 3%;
    }

   
  </style>
</head>

<body>
  <div class="img">
    <img src="logo1.png" class="img-fluid"><br><br><br>
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
          <td><a href="edit.php"><b>Edit Profile</b></a></td>
          <td><a href="viewapp.php"><b>View Application</b></a></td>
        </tr>
      </tbody>
      <!-- </div> -->
    </table>
  </div>
  <br>
  <table class="table table-striped table-bordered table-hover table-responsive-md" id="tab2">
    <thead class="thead table table-primary">
      <tr>
        <th scope="col" style="text-align:center;"> Sr. No.</th>
        <th scope="col" style="text-align:center;"> Reason</th>
        <th scope="col" style="text-align:center;"> Other Reason</th>
        <th scope="col" style="text-align:center;"> Days</th>
        <th scope="col" style="text-align:center;"> CC</th>

        <th scope="col" style="text-align:center;"> CCC</th>

        <th scope="col" style="text-align:center;"> Mentor</th>
        <th scope="col" style="text-align:center;"> Mentor Coordinator</th>
        <th scope="col" style="text-align:center;"> HOD</th>
      </tr>
    </thead>
    <tbody>
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
    </tbody>
  </table>
</body>

</html>