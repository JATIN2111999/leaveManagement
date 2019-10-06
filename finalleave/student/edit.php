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
// echo "$row[dep]";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Edit Profile</title>
  <style>
    .img {
      text-align: center;
      height: 50%;
    }

    table {
      border: 2px solid black;
    }

    td {
      width: 150px;
      text-align: center;
      border: 2px solid black;
      padding: 5px;

    }

    h2 {
      text-align: center;
    }

    form {
      /* text-align: center; */
      width: 75%;
      text-align: center;
      margin: auto;
      /* display: table; */
    }

    .border {
      border-style: hidden;
      height: 110%;
      width: 70%;
      margin: auto;
      background-color: #dee2e6;
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
    <table class="table">
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
  <br><br>
  <div class="row"> 
  <div class="container">
  <div class="border">
  <form class="form-horizontal col-md-offset-3 col-md-9" method="post" action="../actions/update.php">
  <br>
  <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>SELECT MENTOR:</b></label>
            <div class="col-sm-8">
    <select id="mentor" name="mentor" class="custom-select mr-sm-2" id="inlineFormCustomSelect">

      <?php
                        while($table1 = mysqli_fetch_array($showtables1))
                        { 
                         
                          echo "<option value='".$table1['userid']."'>";
                          echo "$table1[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
                      </div>
                      </div>
    <br>
    <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>SELECT CC:</b></label>
            <div class="col-sm-8">
    <select id="cc" name="cc" class="custom-select mr-sm-2" id="inlineFormCustomSelect">  

      <?php
                        while($table2 = mysqli_fetch_array($showtables2))
                        { 
                         
                          echo "<option value='".$table2['userid']."'>";
                          echo "$table2[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
                      </div>
                      </div>
    <br>
    <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>SELECT CCC:</b></label>
            <div class="col-sm-8">
    <select id="ccc" name="ccc" class="custom-select mr-sm-2" id="inlineFormCustomSelect">

      <?php
                        while($table3 = mysqli_fetch_array($showtables3))
                        { 
                         
                          echo "<option value='".$table3['userid']."'>";
                          echo "$table3[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    </div>
    </div>
    <br>
    <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>SELECT MENTOR COORDINATOR</b></label>
            <div class="col-sm-8">
    <select id="mentorco" name="mentorco" class="custom-select mr-sm-2" id="inlineFormCustomSelect">

      <?php
                        while($table4 = mysqli_fetch_array($showtables4))
                        { 
                         
                          echo "<option value='".$table4['userid']."'>";
                          echo "$table4[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    </div>
    </div>
    <br>
    <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>SELECT HOD:</b></label>
            <div class="col-sm-8">
    <select id="hod" name="hod" class="custom-select mr-sm-2" id="inlineFormCustomSelect">

      <?php
                        while($table5 = mysqli_fetch_array($showtables5))
                        { 
                         
                          echo "<option value='".$table5['userid']."'>";
                          echo "$table5[name]";
                          echo "</option>";
                        }
                        ?>
    </select>
    </div>
    </div>
    <br>
    <br>
    <div class="row" style="display:inline">
                <button type="submit" name="update" value="update" style="width:33%;" class="btn btn-primary">UPDATE</button>
            </div>
  </form>
  </div>
  </div>
  </div>
</body>

</html>