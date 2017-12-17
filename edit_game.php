<?php # Script 8.7
include ('includes/session.php');

// This page lets an admin edit the info of a game.

$page_title = 'Edit Game';
include ('includes/header.php');

if ( (isset($_GET['edit_id'])) && (is_numeric($_GET['edit_id'])) ) {
	$edit_id = $_GET['edit_id'];
} elseif ( (isset($_POST['edit_id'])) && (is_numeric($_POST['edit_id'])) ) {
	$edit_id = $_POST['edit_id'];
} else {
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require_once ('mysqli_connect.php'); // Connect to the db.

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	$errors = array();
	
	if (empty($_POST['title'])) {
		$errors[] = 'Title field is blank.';
	} else {
		$title = mysqli_real_escape_string($dbc, trim($_POST['title']));
	}
	
	if(isset($_POST['description'])){
		$desc = mysqli_real_escape_string($dbc, trim($_POST['description']));
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
	
	if (empty($errors)) {
		
		// Query
		$q = "UPDATE game SET game_name = '$title', description = '$desc', genre = '$genre', platform = '$platform', image = '$image' WHERE game_id = $edit_id";
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) {
		
			echo '
			<div class="page-header" style="text-align: center;">
				<h1>Game Updated!</h1>
			</div>
			';
						
		} else {
			echo '
			<div class="page-header" style="text-align: center;">
				<h1>System Error</h1>
			</div>
			';
			
            echo '<div style="text-align: center;"><p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p></div>';
		}

	} else {
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
				echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	}
	
	mysqli_close($dbc); // Close the database connection.

	// Include the footer and quit the script:
	include ('includes/footer.html'); 
	exit();
	
}

$types = array();

// Make the query:
$q = "SELECT game_id, game_name FROM game ORDER BY game_name ASC";
$result = mysqli_query($dbc, $q); // Run the query.

$zzz = @\mysqli_query($dbc, "SELECT * FROM game WHERE game_id = $edit_id");
$row_rev2 = mysqli_fetch_array($zzz, MYSQLI_ASSOC);


$platform_temp = $row_rev2['platform']; //Splits up the platform string into an array.
$platform_explode = explode(', ', $platform_temp);

$genre_temp = $row_rev2['genre'];
$genre_explode = explode(', ', $genre_temp);

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
    <h1>Edit Game</h1>
</div>

<form class="form-signin" action="" method="POST">
	<h3>Game Title:</h3>
	<input class="form-control" name="title" value="<?php echo $row_rev2['game_name']; ?>" />
	<br>
	
	<h3>Game Description:</h3>
	<textarea class="form-control" name="description" rows="5" cols="40"><?php echo $row_rev2['description']; ?></textarea>
	<br>
	
	<h3>Genre:</h3>
	<input type="checkbox" name="genre[]" value="Action" <?php if (in_array('Action', $genre_explode)){ echo "checked='checked'"; } ?> /> Action<br>
	
	<input type="checkbox" name="genre[]" value="Action-Adventure" <?php if (in_array('Action-Adventure', $genre_explode)){ echo "checked='checked'"; } ?> /> Action-Adventure<br>
	
	<input type="checkbox" name="genre[]" value="Adventure" <?php if (in_array('Adventure', $genre_explode)){ echo "checked='checked'"; } ?> /> Adventure<br>
	
	<input type="checkbox" name="genre[]" value="Role-Playing" <?php if (in_array('Role-Playing', $genre_explode)){ echo "checked='checked'"; } ?> /> Role-Playing<br>
	
	<input type="checkbox" name="genre[]" value="Simulation" <?php if (in_array('Simulation', $genre_explode)){ echo "checked='checked'"; } ?> /> Simulation<br>
	
	<input type="checkbox" name="genre[]" value="Strategy" <?php if (in_array('Strategy', $genre_explode)){ echo "checked='checked'"; } ?> /> Strategy<br>
	
	<input type="checkbox" name="genre[]" value="Sports" <?php if (in_array('Sports', $genre_explode)){ echo "checked='checked'"; } ?> /> Sports<br>
	
	<input type="checkbox" name="genre[]" value="Other" <?php if (in_array('Other', $genre_explode)){ echo "checked='checked'"; } ?> /> Other<br>
	
	
	<h3>Platform(s):</h3>
	<input type="checkbox" name="platform[]" value="PC" <?php if (in_array('PC', $platform_explode)){ echo "checked='checked'"; } ?> /> PC<br>
	
	<input type="checkbox" name="platform[]" value="PlayStation 4" <?php if (in_array('PlayStation 4', $platform_explode)){ echo "checked='checked'"; } ?> /> PlayStation 4<br>
	
	<input type="checkbox" name="platform[]" value="Xbox One" <?php if (in_array('Xbox One', $platform_explode)){ echo "checked='checked'"; } ?> /> Xbox One<br>
	
	<input type="checkbox" name="platform[]" value="Wii U" <?php if (in_array('Wii U', $platform_explode)){ echo "checked='checked'"; } ?> /> Wii U<br>
	
	<input type="checkbox" name="platform[]" value="Mobile" <?php if (in_array('Mobile', $platform_explode)){ echo "checked='checked'"; } ?> /> Mobile<br>
	
	<h3>Image:</h3>
	<?php
		echo "<select class='form-control' name='image'>";
		$files = array_map("htmlspecialchars", scandir("./images"));
		foreach ($files as $file){
			echo "<option value='$file' ";
			if (substr($row_rev2['image'],7) == "$file"){
				echo "selected='selected'";
			}
			echo " >$file</option>";
		}
		echo "</select>";
	?>
	<br>
	
	<p><button type="submit" name="submit" class="btn btn-primary" />Submit</button></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>

<hr>

<?php
include ('includes/footer.html');
?>