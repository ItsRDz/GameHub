<?php # Script 8.7 - password.php
include ('includes/session.php');

// This page lets a user change their password.

$page_title = 'Submit a Request';
include ('includes/header.php');

?>

<div class="page-header" style="text-align: center;">
    <h1>Submit a Request</h1>
</div>

<form class="form-signin" method="POST" action="insertticket.php">  
<!-- <h2>Submit a Request </h2> -->
  <h3>Subject:</h3>
	 <input class="form-control" type="text" name="subject">
  <br>
 <h3>Description:</h3>

<textarea class="form-control" name="description" rows="5" cols="40"></textarea>
  <br>
  
  <input class="btn btn-sm btn-primary" type="submit" name="submit" value="Submit">  
</form>

<hr>

<?php
include ('includes/footer.html');
?>
