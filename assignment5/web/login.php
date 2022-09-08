<?php
include 'config.php';
include 'functions.php';

session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = mysqli_escape_string($conn, $_POST['username']);
	$password = mysqli_escape_string($conn, $_POST['password']);

	$user = valid_user($conn, $username, $password);
	if($user !==FALSE){
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
		header('location: index.php?msg="Invalid login credentials."');
	}
}else{
	header('location: index.php');
}

?>