<?php
include 'config.php';
include 'functions.php';

session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $user_type = mysqli_escape_string($conn, $_POST['type']);
  $username = mysqli_escape_string($conn, $_POST['username']);
  $password = mysqli_escape_string($conn, $_POST['password']);

  $sign_up = create_user($conn, $username, $password, $user_type);
  if($sign_up == TRUE){
    $user = valid_user($conn, $username, $password);
    $_SESSION['userid'] = $user['userid'];
    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['username'] = $username;

    if($_SESSION['user_type'] == 1){
      //normal user
      header('location: user/complaints.php');
    }else{
      //admin user
      header('location: admin/complaints.php');
    }
  }else{
    header('location: signup.php?msg="Singnup failed."');
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Feedback Management System!</title>

    <style>
        .card{
            margin:10px;
        };
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
          <marquee style="font-size: 20px;">Feedback Management System</marquee>
        <!-- </a> -->
      </nav>
      <div class="container">
            <div class="row" style="margin-top: 10%; padding-left: 25%">

                  <div class="card mb-12 col-md-12" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="https://img.icons8.com/clouds/2x/user.png" class="card-img" alt="Normal User">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Sign up</h5>
                          <form action="signup.php" method="POST">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Account type</label>
                              <select class="form-control" name="type">
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" class="form-control" id="normalEmail" aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="normalPass" name="password">
                            </div>
                            <div class="form-group" style="text-align: left;margin-top: 5px;">
                                <button type="submit" class="btn btn-primary" ><a style="color: white;">Sign up</a></button>
                                <small style="text-align: left;margin-left: 25px;" >Already have an account? <a href="index.php">Login</a></small>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>    
            </div>
            <!-- <div class="row" style="margin-top: 40%; height: 40%; width: 100%; z-index: 5000;
                background: radial-gradient(circle, black, white);
            "> -->

            </div>

      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>