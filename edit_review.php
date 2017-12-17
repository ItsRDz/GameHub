<?php # Script 8.7
include ('includes/session.php');

// This page lets an admin edit a review for a game.

$page_title = 'Edit Review';
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
		
        // Make the query:
		$a = $_SESSION['user_id'];
        $q = "UPDATE reviews SET review_text = '$e', game_score = '$score_val' WHERE game_id = $gm_id";
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '
				<div class="page-header" style="text-align: center;">
					<h1>Review Updated!</h1>
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

<div class="page-header" style="text-align: center;">
    <h1>Edit Review for '<?php echo $row_rev2['game_name']; ?>'</h1>
</div>

<form class="form-signin" method="POST" action="">

	<h3>Review:</h3>
	<textarea class="form-control" name="review" rows="10" cols="40" ><?php echo $row_rev['review_text']; ?></textarea>
	<br>
	
	<h3>Score: <select name="score">

		<option value="1"  <?php if ($row_rev['game_score'] == "1") echo "selected='selected'";?> >1</option>
		<option value="2"  <?php if ($row_rev['game_score'] == "2") echo "selected='selected'";?> >2</option>
		<option value="3"  <?php if ($row_rev['game_score'] == "3") echo "selected='selected'";?> >3</option>
		<option value="4"  <?php if ($row_rev['game_score'] == "4") echo "selected='selected'";?> >4</option>
		<option value="5"  <?php if ($row_rev['game_score'] == "5") echo "selected='selected'";?> >5</option>
		<option value="6"  <?php if ($row_rev['game_score'] == "6") echo "selected='selected'";?> >6</option>
		<option value="7"  <?php if ($row_rev['game_score'] == "7") echo "selected='selected'";?> >7</option>
		<option value="8"  <?php if ($row_rev['game_score'] == "8") echo "selected='selected'";?> >8</option>
		<option value="9"  <?php if ($row_rev['game_score'] == "9") echo "selected='selected'";?> >9</option>
		<option value="10" <?php if ($row_rev['game_score'] == "10") echo "selected='selected'";?> >10</option>
	
	</select></h3>
	
	<br>
	
	<p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
</form>

<hr>

<?php
include ('includes/footer.html');
?>