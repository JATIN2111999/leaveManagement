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

    .col {
      font-size: 30px;
      text-align: left;
      font-family: 'Courier New', Courier, monospace;
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

  <!-- 
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
    Leave Appl  ication
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

  <br> -->




  <div class="container shadow-lg p-3 mb-5 bg-white rounded ">
    <div class="row">
      <div class="col">
        STUDENT INFO
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
        <br>
        <?php
       echo "<a href='../actions/appr.php?sr=".$sr."&position=".$row2['position']."&dep=".$row['dep']."'>Approve </a>";
      ?>
      </div>
      <div class="col">

        LEAVE APPLICATION
        <br>
        Reason :<?php echo "$row[reason]"; ?>
        <br>
        Days :<?php echo "$row[days]"; ?>
        <br>
        Other :<?php echo "$row[otherr]"; ?>
        <br>
        <br>
        Uploaded Img:<br><?php echo "<img src='../actions/img/".$row['img']."'>"; ?>
        <br>

        <?php
      echo "<a href='../actions/rej.php?sr=".$sr."&position=".$row2['position']."&dep=".$row['dep']."'>Reject </a>";

      ?>
      </div>
    </div>


</body>

</html>