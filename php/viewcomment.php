<?php
include('includes/session.php');
include('includes/header.php');
require_once ('mysqli_connect.php');

echo '<div style="text-align:center">';
echo '<label>Ticket#</label> <label> '.$_GET['id'].'</label>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;<label> '.$_GET['subject'].'</label>&nbsp;&nbsp;&nbsp;&nbsp;
<label> '.$_GET['created_at'].'</label><br/> <br/>

<div style="word-wrap: break-word;text-align:left; margin-left:35%;margin-right:35%;">
<label> Reply: </label> &nbsp;<label width="75%" > '.$_GET['comment'].'</label>
</div>';

?>

