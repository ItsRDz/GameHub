<?php
include('includes/session.php');
include('includes/header.php');
require_once ('mysqli_connect.php');
if(isset($_POST['subject']) && isset($_POST['description']))
{
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$user_id = $_SESSION['user_id'];
	$status = "PENDING";

	$sql = "INSERT INTO tickets(user_id, subject , description, created_at ,notification, comment,status) VALUES ('$user_id', '$subject', '$description', NOW(), FALSE, NULL,'$status' );";
	$r = @mysqli_query ($dbc, $sql);
	
	if($r){
	echo "<h1 align='center' > Your request has been sent!</h1>";
	} else{
		echo "ERROR: ". @mysqli_error($dbc);
	}
	
} else
	echo "you have to enter all the information";


?>