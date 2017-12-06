<?php
include('includes/session.php');
include('includes/header.php');
require_once ('mysqli_connect.php');

if(isset($_POST['comment']) && isset($_POST['id']))
{
	$comment = $_POST['comment'];
	$id = $_POST['id'];
	

	$sql = "UPDATE tickets SET comment='$comment', status='REPLIED' WHERE id='$id' ";
	$r = @mysqli_query ($dbc, $sql);
	
	if($r){
	echo "<h1 align='center'>Reply submitted!</h1>";
	} else{
		echo "ERROR: ". @mysqli_error($dbc);
	}
	
} else
	echo "you have to enter all the information";


?>