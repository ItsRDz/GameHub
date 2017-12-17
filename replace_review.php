<?php # Script 8.7
include ('includes/session.php');

$page_title = 'Replace Review';
include ('includes/header.php');

if ( (isset($_GET['gm_id'])) && (is_numeric($_GET['gm_id'])) ) {
	$gm_id = $_GET['gm_id'];
} elseif ( (isset($_POST['gm_id'])) && (is_numeric($_POST['gm_id'])) ) {
	$gm_id = $_POST['gm_id'];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

if ( (isset($_GET['e'])) ) {
	$e = $_GET['e'];
} elseif ( (isset($_POST['e'])) ) {
	$e = $_POST['e'];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

if ( (isset($_GET['score_val'])) && (is_numeric($_GET['score_val'])) ) {
	$score_val = $_GET['score_val'];
} elseif ( (isset($_POST['score_val'])) && (is_numeric($_POST['score_val'])) ) {
	$score_val = $_POST['score_val'];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require_once ('mysqli_connect.php'); // Connect to the db.

// Make the query:
$a = $_SESSION['user_id'];
$q = "UPDATE reviews SET review_text = '$e', game_score = '$score_val' WHERE game_id = $gm_id";
$r = @mysqli_query ($dbc, $q); // Run the query.

if ($r) { // If it ran OK.

		// Print a message:
		echo '
		<div class="page-header" style="text-align: center;">
			<h1>Review Replaced!</h1>
		</div>
		';	

} else { // If it did not run OK.

		// Public message:
		echo '
		<div class="page-header" style="text-align: center;">
			<h1>System Error</h1>
		</div>
		'; 

		// Debugging message:
		echo '<div style="text-align: center;"><p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p></div>';

} // End of if ($r) IF.

mysqli_close($dbc); // Close the database connection.

// Include the footer and quit the script:
include ('includes/footer.html'); 
exit();



$types = array();

// Make the query:
$q = "SELECT game_id, game_name FROM game ORDER BY game_name ASC";
$result = mysqli_query($dbc, $q); // Run the query.

$rrr = @\mysqli_query($dbc, "SELECT review_text, game_score FROM reviews WHERE game_id = $gm_id");
$row_rev = mysqli_fetch_array($rrr, MYSQLI_ASSOC);

$zzz = @\mysqli_query($dbc, "SELECT game_name FROM game WHERE game_id = $gm_id");
$row_rev2 = mysqli_fetch_array($zzz, MYSQLI_ASSOC);

// Count the number of returned rows:
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.
		   
	while ($row = mysqli_fetch_assoc($result)) {
		$types[] = $row;
	}

	mysqli_free_result ($result); // Free up the resources.	
}

mysqli_close($dbc); // Close the database connection.
?>

<?php
include ('includes/footer.html');
?>