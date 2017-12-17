<?php include ('includes/session.php');
require_once ('mysqli_connect.php');
if (isset($_GET['id']))
{
	$id = (int)$_GET['id'];
	mysqli_query($dbc,"DELETE FROM tickets WHERE id=".$id."");
	mysqli_close($dbc);
	header("Location: viewticket.php");
}
?>
