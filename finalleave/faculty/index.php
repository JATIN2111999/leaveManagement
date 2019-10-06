
  

<?php



session_start();//session starts here


include("../actions/db_connection.php");

if(isset($_POST['login']))
{
    $userid=$_POST['userid'];
    $password=$_POST['password'];

    $check_user="select * from faculty WHERE userid='$userid' AND password='$password'";

    $run=mysqli_query($conn,$check_user);
    $run2=mysqli_num_rows($run);
    if($run2 == 1)
    {
        echo "<script>window.open('home.php','_self')</script>";

        $_SESSION['userid']=$userid;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script><script>window.open('index.php','_self')</script>";
    }
}
?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Faculty Login</title>

      <link rel="stylesheet" href="logobasic.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </head>
  <body>
 






  <div class="body">
  <br>
  <div class="img">
  <img src="logo1.png" class="img-fluid"><br><br>
  </div>
  <div class="row"> 
    <div class="container">
      <div class="border p-5">
      <!-- <div class="jumbotron"> -->
      <br><br><h2><b>LOGIN PAGE</b></h2><br><br>
      <form class="form-horizontal col-md-offset-3 col-md-9" method="POST" action="index.php">
          <div class="form-group row">
          <label class="col-sm-3 col-form-label"><b>User ID:</b></label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="userid" placeholder="Enter User ID" required>
            </div>
          </div>
          <div class="form-group row">
              <label  class="col-sm-3 col-form-label"><b>Password:</b></label>
              <div class="col-sm-9">
              <input type="password" name="password" class="form-control" placeholder="Enter Password" required><br><br>
              </div>
            </div>
            <div class="row" style="display:inline ">
                <button type="submit" name="login" style="width:33%;" class="btn btn-primary">LOGIN</button>
            </div>
      </form>
      </div>
      </div>
      <!-- </div> -->
    </div>
</div>





  </body>
  </html>