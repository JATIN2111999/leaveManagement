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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Welcome Home</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .img {
            text-align: center;
            height: 50%;
        }

        .th1 {
            padding-top: 0%;
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
            height: 100%;
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
                    <td><a href="pending.php"><b>Pending</b></a></td>
                </tr>
            </tbody>
            <!-- </div> -->
        </table>
    </div>
</body>

</html>