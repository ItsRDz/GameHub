<?php # Script 8.7 - password.php
include ('includes/session.php');

// This page lets a user change their password.

$page_title = 'Submit a Request';
include ('includes/header.php');

?>

<div class="page-header" style="text-align: center;">
    <h1>Support</h1>
</div>

<form method="POST" action="">
<div style="text-align: center;">
    <h2> <a href="createticket.php">Submit a Request </a> </h2>
	<h2> <a href="viewticket.php">My Requests </a> </h2>
</div>

<hr>

<?php
include ('includes/footer.html');
?>
