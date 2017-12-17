<?php 
include ('includes/session.php');

$page_title = 'Delete Game';
include ('includes/header.php');

if ( (isset($_GET['delete_id'])) && (is_numeric($_GET['delete_id'])) ) {
	$delete_id = $_GET['delete_id'];
} elseif ( (isset($_POST['delete_id'])) && (is_numeric($_POST['delete_id'])) ) {
	$delete_id = $_POST['delete_id'];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require_once ('mysqli_connect.php'); // Connect to the db.

if (isset($_POST['submitted'])) {
	
	$q = "DELETE FROM game WHERE game_id = $delete_id";
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

		// Print a message:
		echo '
			<div class="page-header" style="text-align: center;">
				<h1>Game Deleted!</h1>
			</div>
		';	

	}
	else{ // If the query did not run OK.
		echo '<p class="error"><h4>The game could not be deleted due to a system error.</h4></p>'; // Public message.
		echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
	}
	
	mysqli_close($dbc); // Close the database connection.

	// Include the footer and quit the script:
	include ('includes/footer.html'); 
	exit();

}

$zzz = @\mysqli_query($dbc, "SELECT game_name FROM game WHERE game_id = $delete_id");
$row_rev2 = mysqli_fetch_array($zzz, MYSQLI_ASSOC);

mysqli_close($dbc);
?>

<div class="page-header" style="text-align: center;">
    <h1>You are about to delete '<?php echo $row_rev2['game_name']; ?>'... ARE YOU SURE!?!?</h1>
</div>

<form class="form-signin" method="POST" action="" >
	<div style="text-align: center;">
		<p><button type="submit" name="submit" class="btn btn-sm btn-primary" style="font-size: 20px; padding: 10px 80px;" />Yep.</button></p>
		<input type="hidden" name="submitted" value="TRUE" />
	</div>
</form>

<div style="text-align: center;">
	<p><a href="games_catalog.php" name="nope" class="btn btn-sm btn-primary" style="font-size: 20px; padding: 10px 80px;" />Nvm</a></p>
</div>

<hr>

<?php
include ('includes/footer.html');
?>