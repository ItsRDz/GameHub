<?php
include('includes/session.php');
require_once ('mysqli_connect.php');

	$user_id = $_SESSION['user_id'];

	$r= "SELECT COUNT(*) FROM tickets WHERE user_id='$user_id' AND comment IS NOT NULL";
	$query = mysqli_query($dbc, $r);
	$count = mysqli_fetch_array($query);
	if($query){
	$count[0];
	}
?>