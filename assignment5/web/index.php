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
                          <h5 class="card-title">Login</h5>
                          <form action="login.php" method="POST">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" class="form-control" id="normalEmail" aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="normalPass" name="password">
                            </div>
                            <div class="form-group" style="text-align: left;margin-top: 5px;">
                                <button type="submit" class="btn btn-primary" ><a style="color: white;">Login</a></button>
                                <small style="text-align: left;margin-left: 25px;" >Don't have an account? <a href="signup.php">Sign Up</a></small>
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