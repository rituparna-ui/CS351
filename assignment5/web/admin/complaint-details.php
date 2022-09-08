<?php
session_start();

include '../config.php';
include '../functions.php';
include '../validate.php';

$id = $_GET['id'];
$complaint = fetch_complaint_by_id($conn, $id);
$complaint = json_decode($complaint);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Complaint details - Feedback System</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div>
                        <h4>Admin Panel</h4>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><b>Hi, <?php echo $_SESSION['username'] ?></b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /content goes here  -->
            <div class="row">
                <div class="col-md-6">
                    <h4><span style="text-align: left;">#<?php echo $complaint->id." ".$complaint->title ?></span></h4>
                    <span>By <?php echo $complaint->username ?></span>
                </div>
            </div>
            <div class="line" style="margin-top: 5px;"></div>
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <!-- <h5 class="card-title">Tender description</h5> -->
                      <h6 class="card-subtitle mb-2 text-muted">Complaint description</h6>
                      <p class="card-text" style="font-size: medium;"><?php echo $complaint->body ?></p>
                    </div>
                  </div>
            </div>

            <div class="row">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal"style="width: 150px; margin-left: 40%; margin-top: 20px;"><a href="complaints.php">Go back</a></button>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <!-- Bid model -->
    <!-- <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script> -->
</body>

</html>