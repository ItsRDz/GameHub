<?php 
include ('includes/session.php');

$page_title = 'Games Catalog';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

$type = $_SESSION['user_type_id'];

$get = "SELECT game_id, game_name FROM game ORDER BY game_name ASC";
$run = @\mysqli_query($dbc, $get);
$num_rows = mysqli_num_rows($run);

echo'
	<div class="page-header" style="text-align: center;">
		<h1>Games Catalog</h1>
		<p>('.$num_rows.' games total)</p>
	</div>
';

echo'			
	<div class="form-signin" style="max-width: 900px;">';
		// ADD game button
		if($type == 3){
			echo '<div style="text-align: center;" >';
			echo '<a class="btn btn-primary" href="add_game.php" style="font-size: 20px; padding: 10px 80px;" >Add Game</a>';
			echo '</div><br><br>'; 		     	
		}
		
		$row_num = 0;
		
		if($run){
			echo'
			    <div class="list-group">
			     	<div class = "panel-group" id ="accordion" >';
			      		// Fetch and print all the records:
						while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
							$row_num = $row_num + 1;
							echo'
								<div class = "panel panel-default">
									<div class = "panel-heading">
										<h4 class = "panel-title" style="font-size: 200%; text-align: center;">';
echo'										<b><a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse'.$row_num.'">
											'.$row['game_name'].'</a></b>';
											
											if($type == 3){
echo'											<br><br>
												<a  style = "padding:6px;" href="edit_game.php?edit_id='.$row['game_id'].'">
													Edit
												</a>
												|
												<a  style = "padding:6px;" href="delete_game.php?delete_id='.$row['game_id'].'">
													Delete
												</a>
												';
											}
											
											
											
echo'									</h4>
									</div>
									
									<div id = "collapse'.$row_num.'" class = "panel-collapse collapse">
										<div calss = "panel-body" style = "padding:40px; line-height: 200%;">
											';
											
											$get_gameId1 = $row['game_id'];
											$get_game = "SELECT * FROM game WHERE game_id = '$get_gameId1'";
											$run_game = @\mysqli_query($dbc, $get_game);
											$game_num_rows = mysqli_num_rows($run_game);
											
											while ($row_game = mysqli_fetch_array($run_game, MYSQLI_ASSOC)) {
											echo'
												<img class="img-responsive" src="'.$row_game['image'].'" alt="">
												<br>
												
												<p>
													<b>Description: </b>'.$row_game['description'].'<hr>
													<b>Genre: </b>'.$row_game['genre'].'<br>
													<b>Platform(s): </b>'.$row_game['platform'].'<br>
												</p>
												
												<hr>';
											}
											
											$get_gameId = $row['game_id'];
											$get_reviews = "SELECT * FROM reviews WHERE game_id = '$get_gameId'";
											$run_reviews = @\mysqli_query($dbc, $get_reviews);
											$rev_num_rows = mysqli_num_rows($run_reviews);
											
											if($rev_num_rows == 0){
											   echo '<p>No review</p>';
											   
											   	if($type == 3){
													echo '
													<a class="btn btn-primary" href="write_review.php?gm_id='.$row['game_id'].'">
														Add Review
													</a>';
												}
											}
											else{
											
												while ($row_rev = mysqli_fetch_array($run_reviews, MYSQLI_ASSOC)) {
													
													$user_rev = "SELECT first_name, last_name FROM users WHERE user_id = ".$row_rev['user_id']."";
													$run_user = @\mysqli_query($dbc, $user_rev);
													$row_user = mysqli_fetch_array($run_user, MYSQLI_ASSOC);
													
													echo'
														<p>
															<b>Score: </b>'.$row_rev['game_score'].' / 10<br>
															<b>Review: </b>'.$row_rev['review_text'].'<br>
															<i>(Posted by '.$row_user['first_name'].' '.$row_user['last_name'].' on '.date('m/d/Y h:i a', strtotime($row_rev['date_posted'])).')</i><br>
														</p>';
												
												}
												
												if($type == 3){
													echo '
													<a class="btn btn-primary" href="edit_review.php?gm_id='.$row['game_id'].'">
														Edit Review
													</a>';
												}
											
											}
											
											
											


echo'									</div>
									</div>
								</div>
							';
						}

echo'				</div>
				</div>
			';
		}
		else{
			echo '<p> No results found.</p>';
		}
echo'</div>';


echo'
	<hr>
';

mysqli_close($dbc);
?>


<?php
include ('includes/footer.html');
?>