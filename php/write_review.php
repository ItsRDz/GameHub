<?php # Script 8.7 - password.php
include ('includes/session.php');

// This page lets an admin write a review for a game.

$page_title = 'Write Review';
include ('includes/header.php');

if ( (isset($_GET['gm_id'])) && (is_numeric($_GET['gm_id'])) ) {
	$gm_id = $_GET['gm_id'];
} elseif ( (isset($_POST['gm_id'])) && (is_numeric($_POST['gm_id'])) ) {
	$gm_id = $_POST['gm_id'];
}

require_once ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

    $errors = array(); // Initialize an error array.

    // Check for a review:
    if (empty($_POST['review'])) {
            $errors[] = 'Review field is blank.';
    } else {
            $e = mysqli_real_escape_string($dbc, trim($_POST['review']));
    }
	
	if(isset($_POST['game'])){
			$game_val = $_POST['game'];  // Storing Selected Value In Variable
	}
	
	if(isset($_POST['score'])){
			$score_val = $_POST['score'];  // Storing Selected Value In Variable
	}
	
    if (empty($errors)) { // If everything's OK.
			
		//Check if review already exists for this game.
		$zzz = @\mysqli_query($dbc, "SELECT game_name FROM game WHERE game_id = $game_val");
		$row_rev2 = mysqli_fetch_array($zzz, MYSQLI_ASSOC);
		
		$get_reviews = "SELECT * FROM reviews WHERE game_id = $game_val";
		$run_reviews = @\mysqli_query($dbc, $get_reviews);
		$rev_num_rows = mysqli_num_rows($run_reviews);
		
		if($rev_num_rows == 1){
			echo '
			<div class="page-header" style="text-align: center;">
				<h1>There is already a review for \'' . $row_rev2['game_name'] . '\'...</h1>
			</div>
			
			<div style="text-align: center;">
				<p><a href="replace_review.php?gm_id='.$game_val.'&e='.$e.'&score_val='.$score_val.'" name="view" class="btn btn-sm btn-primary" style="font-size: 20px; padding: 10px 80px;" />Replace Review</a></p>
			</div>
			
			<div style="text-align: center;">
				<p><a href="edit_review.php?gm_id='.$game_val.'" name="view" class="btn btn-sm btn-primary" style="font-size: 20px; padding: 10px 80px;" />View Review</a></p>
			</div>
			<hr>
			';
			
			mysqli_close($dbc); // Close the database connection.
			
			// Include the footer and quit the script:
			include ('includes/footer.html'); 
			exit();
		}
		
        // Make the query:
		$a = $_SESSION['user_id'];
        $q = "INSERT INTO reviews (user_id, game_id, review_text, game_score) VALUES ($a, $game_val, '$e', $score_val)";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '
				<div class="page-header" style="text-align: center;">
					<h1>Review Posted!</h1>
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

    } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.
} 

$types = array();

// Make the query:
$q = "SELECT game_id, game_name FROM game ORDER BY game_name ASC";

$result = mysqli_query($dbc, $q); // Run the query.

$zzz = @\mysqli_query($dbc, "SELECT * FROM game WHERE game_id = $gm_id");
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

<div class="page-header" style="text-align: center;">
    <h1>Write Review</h1>
</div>

<form class="form-signin" method="POST" action="">
	
	<h3>Game: <select name="game">
    <?php
		foreach ($types as $type) {
			echo "<option value=\"" . $type['game_id']. "\" ";
			if ($row_rev2['game_id'] == $type['game_id']) echo "selected='selected'";
			echo ">" . $type['game_name'] . "</option>\n";
		}
	?>
    </select></h3>
	
	<h3>Review:</h3>
	<textarea class="form-control" name="review" rows="10" cols="40"></textarea>
	<br>
	
	<h3>Score: <select name="score">

		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	
	</select></h3>
	
	<br>
	
	<p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
</form>

<hr>

<?php
include ('includes/footer.html');
?>