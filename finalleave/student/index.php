<!DOCTYPE html>
<html>

<head>
  <title>Student Login</title>
</head>
<link rel="stylesheet" href="logobasic.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
      <form class="form-horizontal col-md-offset-3 col-md-9" method="POST" action="../actions/auth.php">
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
                <button type="submit" name="Sign Up" style="width:33%;" class="btn btn-success">SIGN UP</button>
                <button type="submit" name="Reset" style="width:33%;" class="btn btn-danger">RESET</button>
            </div>
      </form>
      </div>
      </div>
      <!-- </div> -->
    </div>
</div>
</body>

</html>