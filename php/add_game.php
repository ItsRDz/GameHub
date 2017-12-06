<?php # Script 8.7 - password.php
include ('includes/session.php');

// This page lets an admin add a game.

$page_title = 'Add Game';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

    $errors = array(); // Initialize an error array.

    // Check fields:
    if (empty($_POST['title'])) {
        $errors[] = 'Title field is blank.';
    } else {
        $title = mysqli_real_escape_string($dbc, trim($_POST['title'])); // mysqli_real_escape_string is to ignore special characters that would cause problems when transferring the string to the database.
    }
	
	if(isset($_POST['description'])){
		$desc = mysqli_real_escape_string($dbc, trim($_POST['description']));  // Storing Selected Value In Variable
	}
	
	if(isset($_POST['genre'])){
		$genre = implode(', ', $_POST['genre']);
	}
	
	if(isset($_POST['image'])){
		$image = "images/" . $_POST['image'];  // For image. It assumes you already have an image with the filename on the server.
	}
	
	if(isset($_POST['platform'])){
		$platform = implode(', ', $_POST['platform']);
	}
	
    if (empty($errors)) { // If everything's OK.
		
        // Make the query:
        $q = "INSERT INTO game (game_name, description, genre, platform, image) VALUES ('$title', '$desc', '$genre', '$platform', '$image')";		
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '
				<div class="page-header" style="text-align: center;">
					<h1>Game Added!</h1>
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
    <h1>Add Game</h1>
</div>

<form class="form-signin"  method="POST" action="add_game.php">
	
	<h3>Title:</h3>
	<input class="form-control" name="title" />
	<br>
	
	<h3>Description:</h3>
	<textarea class="form-control" name="description" rows="5" cols="40"></textarea>
	<br>
	
	<h3>Genre:</h3>
	<input type="checkbox" name="genre[]" value="Action" /> Action<br>
	<input type="checkbox" name="genre[]" value="Action-Adventure" /> Action-Adventure<br>
	<input type="checkbox" name="genre[]" value="Adventure" /> Adventure<br>
	<input type="checkbox" name="genre[]" value="Role-Playing" /> Role-Playing<br>
	<input type="checkbox" name="genre[]" value="Simulation" /> Simulation<br>
	<input type="checkbox" name="genre[]" value="Strategy" /> Strategy<br>
	<input type="checkbox" name="genre[]" value="Sports" /> Sports<br>
	<input type="checkbox" name="genre[]" value="Other" /> Other<br>
	
	<h3>Platform(s):</h3>
	<input type="checkbox" name="platform[]" value="PC" /> PC<br>
	<input type="checkbox" name="platform[]" value="PlayStation 4" /> PlayStation 4<br>
	<input type="checkbox" name="platform[]" value="Xbox One" /> Xbox One<br>
	<input type="checkbox" name="platform[]" value="Wii U" /> Wii U<br>
	<input type="checkbox" name="platform[]" value="Mobile" /> Mobile<br>
	
	<h3>Image:</h3>
	<?php
		echo "<select class='form-control' name='image'>";
		$files = array_map("htmlspecialchars", scandir("./images"));
		foreach ($files as $file)
			echo "<option value='$file'>$file</option>";
		echo "</select>";
	?>
	
	<br>
	
	<p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
</form>

<hr>

<?php
include ('includes/footer.html');
?>