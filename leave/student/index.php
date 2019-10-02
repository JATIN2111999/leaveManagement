
  

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Student Login</title>
  </head>
  <link rel="stylesheet" href="../files/css/bootstrap.min.css">
  <script src="../files/js/bootstrap.min.js"></script>
  <body>
   <form action="../actions/auth.php" method="post" class="container">
    <h1>Login</h1>

    <label ><b>Email</b></label>
    <input type="text" placeholder="Enter UserID" name="userid" required>

    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="login" value="login" class="btn btn-danger">Login</button>
  </form>
  </body>
  </html>