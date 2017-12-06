<?php
	session_start(); 
	$user_name = "User";
	$is_admin = false;
	$count=$count[0];
	if (isset($_SESSION['user_id'])) {
	
	require_once ('mysqli_connect.php');

	$user_id = $_SESSION['user_id'];

	$r= "SELECT COUNT(*) FROM tickets WHERE user_id='$user_id' AND comment IS NOT NULL";
	$query = mysqli_query($dbc, $r);
	$count = mysqli_fetch_array($query);
	if($query){
	$count = $count[0];
	}
		$user_name = 'Hello ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
		
		if(isset($_SESSION['user_type_id']) && $_SESSION['user_type_id'] == 3) {
			$is_admin = true;
		}
	}		
?>