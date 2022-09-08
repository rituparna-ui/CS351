<?php
include '../config.php';
include '../functions.php';

session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$title = mysqli_escape_string($conn, $_POST['title']);
	$description = mysqli_escape_string($conn, $_POST['description']);
	$userid = $_SESSION['userid'];

	$user = register_complaint($conn, $userid, $title, $description);
	if($user){
		header('location: complaints.php');
	}else{
		header('location: complaints.php?msg="Compalint registraion erorr."');
	}
}else{
	header('location: index.php');
}

?>