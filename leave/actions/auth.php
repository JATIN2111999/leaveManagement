

<?php



session_start();//session starts here


include("db_connection.php");

if(isset($_POST['login']))
{
    $userid=$_POST['userid'];
    $password=$_POST['password'];

    $check_user="select * from student WHERE userid='$userid' AND password='$password'";

    $run=mysqli_query($conn,$check_user);
    $run2=mysqli_num_rows($run);
    if($run2 == 1)
    {
        echo "<script>window.open('../student/home.php','_self')</script>";

        $_SESSION['userid']=$userid;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script><script>window.open('index.php','_self')</script>";
    }
}
?>