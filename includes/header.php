<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- Bootstrap core CSS -->
    <!--<link href="css/bootstrap.min.css" rel="stylesheet" />-->
	<link href="css/bootstrap_3.min.css" rel="stylesheet" />
        
    <!-- Bootstrap theme -->
	<link href="css/theme.css" rel="stylesheet" />
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	
    <!-- Custom CSS -->
	<!-- 
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> 
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> 
	<link rel="stylesheet" href="css/otherstyle.css"> 
	-->
    
    <title><?php echo $page_title; ?></title>
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body role="document">
    <div style="text-align: center;">
		<img class="page-header" src="images/GameHubLogo.jpg" alt="Game Hub" style="width: 300px; height: auto; margin: 20px 0 20px;">
    </div>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $user_name ?></a>
        </div>
        <div class="navbar-collapse collapse" style="float: right;">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
			<li><a href="games_catalog.php">Games</a></li>
			<li><a href="games_news.php">News</a></li>
                
			<?php 
			if (!isset($_SESSION['user_id'])) {
				echo '<li><a href="register.php">Register</a></li> ';
				echo '<li><a href="login.php">Sign In</a></li>';
				
			}
			else
			{
if ($is_admin) {
					echo '<li><a href="write_review.php">Write Review</a></li>';
					echo '<li><a href="view_users.php">View Users</a></li>';
					echo '<li><a href="viewticket.php">View Tickets</a></li>';
					echo '<li><a href="password.php">Change Password</a></li>';
					echo '<li><a href="logout.php">Log Out</a></li>';
				}else{
					if($count[0]>0){
						echo '<li><a href="support.php">Support <label class="text-danger">(' . $count[0] .')</label></a></li>';
						
					}else{
						echo '<li><a href="support.php">Support</a></li>';
					}
						
					echo '<li><a href="password.php">Change Password</a></li>';
					echo '<li><a href="logout.php">Log Out</a></li>';
					
				}
			}
			?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <!-- Commented out to maximize width of content.
	
    <div class="container theme-showcase" role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->
    <!--    <div class="jumbotron">
          <!-- Start of the page-specific content. -->
<!-- Script 8.1 - header.html -->
