<?php
include('includes/session.php');
include('includes/header.php');
require_once ('mysqli_connect.php');
echo '<div style="text-align:center">';
echo '<label>Ticket#</label> <label> '.$_GET['id'].'</label>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;<label> '.$_GET['subject'].'</label>&nbsp;&nbsp;&nbsp;&nbsp;<label> '.$_GET['created_at'].'</label><br/> <br/>';





echo '<label>Description: </label> <div style="word-wrap: break-word;text-align:left; margin-left:35%;margin-right:35%;">
<p> '.$_GET['description'].'</p>
</div><br/> <br/>' ;




?>

<form method="POST" action="insertcomment.php">  
<input readonly type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
<h2>Reply</h2>
 <h3> Comment: </h3> <br>

<textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>

  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>