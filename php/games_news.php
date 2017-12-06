<?php 
include ('includes/session.php');

$page_title = 'Game News';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

$type = $_SESSION['user_type_id'];

echo'
	<div class="page-header" style="text-align: center;">
		<h1>Game News</h1>
	</div>
';

$get = "SELECT news_id, news_title FROM news ORDER BY news_title ASC";
$run = @\mysqli_query($dbc, $get);
$num_rows = mysqli_num_rows($run);

echo'			
	<div class="form-signin" style="max-width: 900px;">';
		// ADD news button
		if($type == 3){
			echo '<div style="text-align: center;" >';
			echo '<a class="btn btn-primary" href="add_news.php" style="font-size: 20px; padding: 10px 80px;" >Add News</a>';
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
								<div class = "panel panel-default" style="border-radius: 40px;">
									<div class = "panel-heading">
										<h4 class = "panel-title" style="font-size: 200%; text-align: center;">';
echo'										<b><a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse'.$row_num.'">
											'.$row['news_title'].'</a></b>';
											
											if($type == 3){
echo'											<br><br>
												<a  style = "padding:6px;" href="edit_news.php?edit_id='.$row['news_id'].'">
													Edit
												</a>
												|
												<a  style = "padding:6px;" href="delete_news.php?delete_id='.$row['news_id'].'">
													Delete
												</a>
												';
											}
											
											
											
echo'									</h4>
									</div>
									
									<div id = "collapse'.$row_num.'" class = "panel-collapse collapse">
										<div calss = "panel-body" style = "padding:40px; line-height: 200%;">
											';
											
											$get_newsId1 = $row['news_id'];
											$get_news = "SELECT * FROM news WHERE news_id = '$get_newsId1'";
											$run_news = @\mysqli_query($dbc, $get_news);
											$news_num_rows = mysqli_num_rows($run_news);
											
											while ($row_news = mysqli_fetch_array($run_news, MYSQLI_ASSOC)) {
											echo'
												<img class="img-responsive" src="'.$row_news['image'].'" alt="">
												<br>
												
												<p>
													<b>Description: </b>'.$row_news['news_text'].'<hr>
													<b>Genre: </b>'.$row_news['genre'].'<br>
													<b>Platform(s): </b>'.$row_news['platform'].'<br>
												</p>';
											}
											
											$get_newsId = $row['news_id'];
											$get_reviews = "SELECT * FROM reviews WHERE news_id = '$get_newsId'";
											$run_reviews = @\mysqli_query($dbc, $get_reviews);
											$rev_num_rows = mysqli_num_rows($run_reviews);


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
			echo "error: " . $dbc->error."<br>";
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