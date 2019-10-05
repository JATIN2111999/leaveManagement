
  

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
  </head>
  <body>
   <form action="index.php" method="post" class="container">
    <h1>Login</h1>

    <label ><b>Email</b></label>
    <input type="text" placeholder="Enter UserID" name="userid" required>

    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="login" value="login" class="btn">Login</button>
  </form>
  </body>
  </html>