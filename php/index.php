<?php # Script 3.4 - index.php
include ('includes/session.php');

$page_title = 'Game Hub';
include ('./includes/header.php');
?>

<!-- HTML stuff -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Game Hub</title>

    <!-- Bootstrap Core CSS -->
    <!--<link href="css/bootstrap_2.css" rel="stylesheet">-->
	<link href="css/bootstrap_3.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/GameHub.css" rel="stylesheet">

</head>

<body>
	<!--<div style="text-align: center;">
		<img class="page-header" src="images/GameHubLogo.jpg" alt="Game Hub" style="width: 300px; height: auto; margin: 20px 0 20px;">
    </div>-->
	
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/Overwatch.png');"></div>
                <div class="carousel-caption" style="top: 26%; bottom: auto; max-width: 100%; width:100%; left: 0;">
                    <h2 style="color: white; background-color: rgba(0, 0, 0, 0.5); padding: 20px 0px 20px 0px;
						background: -webkit-linear-gradient(left, rgba(255,0,0,0), rgba(255,0,0,1)); /* For Safari 5.1 to 6.0 */
						background: -o-linear-gradient(right, rgba(255,0,0,0), rgba(255,0,0,1)); /* For Opera 11.1 to 12.0 */
						background: -moz-linear-gradient(right, white, white); /* For Firefox 3.6 to 15 */
						background: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0) 100%); /* Standard syntax (must be last) */">Overwatch</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/Inside.jpg');"></div>
                <div class="carousel-caption" style="top: 26%; bottom: auto; max-width: 100%; width:100%; left: 0;">
                    <h2 style="color: white; background-color: rgba(0, 0, 0, 0.5); padding: 20px 0px 20px 0px;
						background: -webkit-linear-gradient(left, rgba(255,0,0,0), rgba(255,0,0,1)); /* For Safari 5.1 to 6.0 */
						background: -o-linear-gradient(right, rgba(255,0,0,0), rgba(255,0,0,1)); /* For Opera 11.1 to 12.0 */
						background: -moz-linear-gradient(right, white, white); /* For Firefox 3.6 to 15 */
						background: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0) 100%); /* Standard syntax (must be last) */">Inside</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/Dishonored_2.jpg');"></div>
                <div class="carousel-caption" style="top: 26%; bottom: auto; max-width: 100%; width:100%; left: 0;">
                    <h2 style="color: white; background-color: rgba(0, 0, 0, 0.5); padding: 20px 0px 20px 0px;
						background: -webkit-linear-gradient(left, rgba(255,0,0,0), rgba(255,0,0,1)); /* For Safari 5.1 to 6.0 */
						background: -o-linear-gradient(right, rgba(255,0,0,0), rgba(255,0,0,1)); /* For Opera 11.1 to 12.0 */
						background: -moz-linear-gradient(right, white, white); /* For Firefox 3.6 to 15 */
						background: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0) 100%); /* Standard syntax (must be last) */">Dishonored 2</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
	
	<hr>
	
    <!-- Page Content -->
    <div class="container">
	
        <!-- Featured Games -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Featured Games</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                    <img style="border-radius: 20px;" class="img-responsive img-portfolio img-hover" src="images/Dishonored_2.jpg" alt="Dishonored 2">
				
				<h3 style="margin-bottom: -50px; position: relative; top: -110px; left: 0px; width: 100%; color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px;">Dishonored 2</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                    <img style="border-radius: 20px;" class="img-responsive img-portfolio img-hover" src="images/Inside.jpg" alt="Inside">
				
				<h3 style="margin-bottom: -50px; position: relative; top: -110px; left: 0px; width: 100%; color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px;">Inside</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                    <img style="border-radius: 20px;" class="img-responsive img-portfolio img-hover" src="images/Overwatch.png" alt="Overwatch">
				
				<h3 style="margin-bottom: -50px; position: relative; top: -110px; left: 0px; width: 100%; color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px;">Overwatch</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                    <img style="border-radius: 20px;" class="img-responsive img-portfolio img-hover" src="images/Doom.jpg" alt="Doom">
				
				<h3 style="margin-bottom: -50px; position: relative; top: -110px; left: 0px; width: 100%; color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px;">Doom</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                    <img style="border-radius: 20px;" class="img-responsive img-portfolio img-hover" src="images/FinalFantasy_XV.jpg" alt="Final Fantasy XV">
				
				<h3 style="margin-bottom: -50px; position: relative; top: -110px; left: 0px; width: 100%; color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px;">Final Fantasy XV</h3>
            </div>
            <div class="col-md-4 col-sm-6">
                    <img style="border-radius: 20px;" class="img-responsive img-portfolio img-hover" src="images/Uncharted_4.jpg" alt="Uncharted 4">
				
				<h3 style="margin-bottom: -50px; position: relative; top: -110px; left: 0px; width: 100%; color: white; background-color: rgba(0, 0, 0, 0.5); padding: 10px;">Uncharted 4</h3>
            </div>
        </div>
		
        <!-- Game of the Month -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Game of the Month</h2>
            </div>
            <div class="col-md-6">
                <h3><strong>Doom</strong></h3>
                <p style="line-height: 200%;">
					Developed by id software, the studio that pioneered the first-person shooter genre and created multiplayer Deathmatch, 
					DOOM returns as a brutally fun and challenging modern-day shooter experience. Relentless demons, impossibly destructive guns, 
					and fast, fluid movement provide the foundation for intense, first-person combat - whether you're obliterating demon hordes 
					through the depths of Hell in the single-player campaign, or competing against your friends in numerous multiplayer modes. 
					Expand your gameplay experience using DOOM SnapMap game editor to easily create, play, and share your content with the world.
				</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="images/Doom.jpg" alt="">
            </div>
        </div>

        <hr>

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap_2.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

<!-- End of HTML stuff -->

<?php
include ('./includes/footer.html');
?>