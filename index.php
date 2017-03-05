 <!-- 
	//////////////////////////////////////////////////////

	HEY DADDY! - CodeForAsia
	DESIGNED & DEVELOPED by Stephanie and Ching Hui 

	/////////////////////////////////////////////////////
-->

<!-- PHP -->
<?php

include 'config.php';
date_default_timezone_set('Asia/Singapore');

$menu = (isset($_GET['menu']) ? $_GET['menu'] : null);

?>
<!-- End .PHP -->


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hey Daddy!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A super daddy website" />
	<meta name="keywords" content="daddy, father, dad, kids, baby, family" />
	<meta name="author" content="Stephanie, Ching Hui" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">

	<!-- Google Webfonts -->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Varela+Round');
	</style>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Salvattore -->
	<link rel="stylesheet" href="css/salvattore.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<!-- Navigation Bar -->
		
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			  	
				    <div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					     </button>
					     
					     <a class="navbar-brand" href="http://overseaspicks.com/heydaddy/index.php"><img src="img/logo1.png" /></a>	
					 
					     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
							  <li class=<?php if ($menu == '') {echo '"active"';}  ?>><a href="index.php">Home</span></a></li>
							  <li class=<?php if ($menu == 'about') {echo '"active"';} ?>><a href="index.php?menu=about">About</a></li>
							  <li class=<?php if ($menu == 'learn') {echo '"active"';} ?>><a href="index.php?menu=learn">Learn</a></li>
							  <li class=<?php if ($menu == 'stories') {echo '"active"';} ?>><a href="index.php?menu=stories">Stories</a></li>
							  <li class=<?php if ($menu == 'events') {echo '"active"';} ?>><a href="index.php?menu=events">Events</a></li>
							  <li class=<?php if ($menu == 'contact') {echo '"active"';} ?>><a href="index.php?menu=contact">Contact us</a></li>
							</ul>
						</div>
			  	</div>

			  </div>
			</nav>
	<!-- END .Navigation Bar -->
	
	<!-- Content -->

	<?php
		if ($menu == "about"){
			 include "about.php";
		} else if ($menu == "stories"){
			 include "stories.php";
		} else if ($menu == "learn"){
			 include "learn.php";
		} else if ($menu == "events"){
			 include "events.php";
		} else if ($menu == "contact"){
			 include "contact.php";	 
		} else if ($menu == "blog"){
			 include "blog.php";	
		} else {
	?>

	<!-- Main Content -->

	<div id="fh5co-main">
		<div class="container">

			<div class="row">

	        	<div id="fh5co-board" data-columns>

	        		<?php
	        			$sql = "SELECT * FROM post ORDER BY post_id DESC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
	        		?>

		        	<div class="item">
		        		<div class="animate-box">
			        		<a href="img/post/<?php echo $row["post_image"]?>" class="image-popup fh5co-board-img" title="<?php echo $row["post_title"]?>"><img src="img/post/<?php echo $row["post_image"]?>" alt="<?php echo $row["post_title"]?>"></a>
		        		</div>
		        		<div class="fh5co-desc">
		        			<span class="label label-<?php echo $row["post_category"]?>"><?php echo $row["post_category"]?></span> <br />
		        			<h3><a href="index.php?menu=blog&id=<?php echo $row["post_id"]?>">  <?php echo $row["post_title"]?>  </a></h3>
		        			<?php echo $row["post_description"]?>
		        		</div>
		        	</div>

		        	<?php } } ?>

	        	</div>

        	</div>

        	<hr class="small">
       </div>
	</div>
	<!-- END .Main Content -->

	<?php } ?>

	<!-- END .Content -->

	<!-- Footer -->

	<footer id="fh5co-footer">
		
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-12 text-center">
					<p class="fh5co-social-icons">
						<a href="https://twitter.com/hey_daddy_"><i class="icon-twitter"></i></a>
						<a href="https://www.facebook.com/heydaddyhome/"><i class="icon-facebook"></i></a>
						<!--- <a href="#"><i class="icon-instagram"></i></a>
						<a href="#"><i class="icon-pinterest"></i></a> --->
					</p>
					<p><small>Hey Daddy! &copy;2017. All Rights Reserved. <br>Designed by: <a href="http://freehtml5.co/" target="_blank">Stephanie and Ng Ching Hui</a> | Images by: <a href="http://pexels.com" target="_blank">Pexels</a>, <a href="http://pixabay.com" target="_blank">Pixabay</a> </small></p>
				</div>
			</div>
		</div>
	</footer>

	<!-- END .Footer -->


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Salvattore -->
	<script src="js/salvattore.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
	
	</body>
</html>
