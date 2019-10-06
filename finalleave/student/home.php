<?php
session_start();
if(!$_SESSION['userid'])
{
    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}
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
        body{
            overflow-x:hidden;
        }
        .img{
            text-align: center;
            height:50%;
        }
        .th1{
            padding-top: 0%;
        }
        table{
            border:2px solid black;
        }
        td{ 
                width:150px; 
                text-align:center; 
                border:2px solid black; 
                padding:5px; 
              
            } 
            h2{
                 text-align: center;
            }
        form{
             /* text-align: center; */
             width:75%;
             text-align: center;
             margin: auto;
             /* display: table; */
            }
        .border{
             border-style: hidden;
             height:100%;
             width:70%;
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
    <br>
    <div class="row"> 
    <div class="container">
      <div class="border">
      <!-- <div class="jumbotron"> -->
      <br><br><h2><b>LEAVE DETAILS</b></h2><br><br>
      <form class="form-horizontal col-md-offset-3 col-md-9" method="post" action="../actions/leave.php">
          <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>LEAVE REASON:</b></label>
            <div class="col-sm-8">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                     <option selected>Choose...</option>
                     <option value="1">Medical</option>
                     <option value="2">Committee</option>
                     <option value="3">Emergency</option>
                     <option value="4">Others</option>
            </select>
            </div>
          </div>
          <br>
            <div class="form-group row">
          <label class="col-sm-4 col-form-label"><b>NUMBER OF DAYS:</b></label>
            <div class="col-sm-8">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                     <option selected>Choose...</option>
                     <option value="1">1 day</option>
                     <option value="2">3 days</option>
                     <option value="3">3-5 days</option>
                     <option value="4">More than 5 days</option>
            </select>
            </div>
        </div>
            <br>
            <div class="form-group row">
              <div class="col-sm-12">
              <input type="text" name="others" class="form-control" placeholder="Other Reason (If Any)"><br><br>
              </div>
            </div>
            <div class="row" style="display:inline">
                <button type="submit" name="leave" style="width:33%;" class="btn btn-primary">SUBMIT</button>
            </div>
      </form>
      </div>
      </div>
      <!-- </div> -->
    </div>
</body>
</html>
<!-- <a href="logout.php"><b>Logo</b>ut</a>
<br>
<a href="home.php"><b>Home</b></a>
<br>
<a href="edit.php"><b>Edit</b> Profile</a>
<br>
<a href="viewapp.php"><b>View</b> Application</a>

    <form  method="post" action="../actions/leave.php" <b>>
  </b>  <label ><b>Leave Reason</b></label>
    <select id="reason" name="reason">
 	<option value="medical">Medical</option>
 	<option value="committee">Committee</option>
 	<option value="emergency"> Emergency</option>
 	<option value="other">Other</option>
 </select><br>
    <input type="text" placeholder="Other Reason" name="otherr" >
<br><br>
    <label ><b>No. of Days</b></label>
    <select id="days" name="days">
    	<option value="1">1 Day</option>
    	<option value="3">3 Days</option>
    	<option value="4">3-5 Days</option>
    	<option value="6">More Than 5 Days</option>
    </select>
    <br>
    <br>
    <button type="submit" name="leave" value="leave" >Submit</button>
</form> -->