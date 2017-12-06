<?php # Script 8.6 - view_users.php #2
include ('includes/session.php');
// This script retrieves all the records from the users table.

$page_title = 'View User Ticket';
include ('includes/header.php');

// Page header:
echo '
<div class="page-header" style="text-align: center;">
    <h1>Your Requests</h1>
</div>
';

require_once ('mysqli_connect.php'); // Connect to the db.
$user_id = $_SESSION['user_id'];
// Make the query:
if($is_admin){
	$q = "SELECT * FROM tickets";	
	
}else{
	
	$q = "SELECT * FROM tickets WHERE user_id=$user_id";	
}
	
$r = @\mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

if($is_admin){
	

}else{
	
	echo "<div style='text-align: center;'>
		<p>There are " .$count[0] . " replys.</p> </div>";	
	
}
	echo "
	<div style='text-align: center;'>
		<p>You have $num requests.</p>
		
	</div>
	";
	

	

	// Table header.
	echo '<table align="center" class="table" style="width:75%;">
	<tr><td ><b>Ticket#</b></td>
		<td ><b>Subject</b></td>
		<td><b>Description</b></td>
		<td ><b>Created at</b></td>
		<td ><b>Status</b></td>
		</tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td>' . $row['id'] . '</td>';
		
		if(isset($row['comment'])){
			echo "<td><a class='text-danger' href=\"viewcomment.php?id=".$row['id']."&subject=".$row['subject']."&description=".$row['description']."&created_at=".$row['created_at']."&status=".$row['status']."&comment=".$row['comment']."\">". $row['subject'] ."</a></td>";
		}else{
			echo '<td>' . $row['subject'] . '</td>'	;	
		}
			echo
			'<td>' . $row['description'] . '</td> 
			<td>' . $row['created_at'] . '</td>
			<td>' . $row['status'] . '</td>';
			
			
			
			if($is_admin ){
				echo "<td><a type='button' class='btn btn-info' href=\"comment.php?id=".$row['id']."&subject=".$row['subject']."&description=".$row['description']."&created_at=".$row['created_at']."&status=".$row['status']."\">Reply</a></td>";
				echo "<td><a type='button' class='btn btn-danger' href=\"delete.php?id=".$row['id']."\">Delete</a></td>";
				
			}
			
			
			echo '</tr>';
	}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '
	<div style="text-align: center;">
		<p class="error">You have no requests</p>
	</div>
	';

}

mysqli_close($dbc); // Close the database connection.

echo '<hr>';

include ('includes/footer.html');
?>
