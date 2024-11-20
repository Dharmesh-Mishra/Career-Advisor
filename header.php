<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Intelligent Career Guidance</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/s.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!--Header-->
        <!-- <header id="header" class="transparent-nav" style="position: fixed;background-color: black; top: 0;">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="main.php">Career Advisor </a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<?php
					// Check if the user is logged in, if not then redirect him to login page
					if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true):
				?>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="main.php">Home</a></li>
                        <li ><a href="login.php">Career Prediction</a></li>
						<li> <a href="community.php">Community</a></li>
                               <li> <a href="courses.php">Courses</a></li>
                               <li><a href="blog.php">Career Roadmaps</a></li> 
							
						<li><a href="main.php#about">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li>
							<a href="login.php">Login</a>
						</li>
						<li>
							<a href="register.php">Register</a>
						</li>
						
                        
					</ul>
				</nav>
				<!-- /Navigation -->
				<?php else: ?>
					<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
					<li><a href="main.php">Home</a></li>
                        <li ><a href="http://127.0.0.1:5000/">Career Prediction</a></li>
						<li> <a href="community.php">Community</a></li>
                               <li> <a href="courses.php">Courses</a></li>
                               <li><a href="blog.php">Career Roadmaps</a></li> 
							
						<li><a href="main.php#about">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="logout.php" >Log out</a></li>
						
                        
					</ul>
				</nav>
				<!-- /Navigation -->
				<?php endif ?>

			</div>
		</header> -->


<header id="header" class="transparent-nav" style="position: fixed; background-color: #8387C5; top: 0; width: 100%; z-index: 1000;">
<div class="container" style="text-align: center; padding-top: 2rem;">


        <!-- Logo on First Line and Centered -->
        <div class="navbar-brand" style="width: 100%; margin-bottom: 10px;">
            <a class="logo" href="main.php" style="font-size: 48px; font-weight: bold; color: white; text-transform: uppercase; display: inline-block;">Intelligent IT Career Advisor</a>
        </div>

        <!-- Navigation on Second Line -->
        <div style="width: 100%;">
            <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true): ?>
            <nav id="nav" style="text-align: center;">
                <ul class="main-menu nav navbar-nav" style=" justify-content: center; gap: 15px; padding: 0; list-style: none;">
                    <li><a href="main.php" style="color: white;">Home</a></li>
                    <li><a href="login.php" style="color: white;">Career Prediction</a></li>
                    <li><a href="community.php" style="color: white;">Community</a></li>
                    <li><a href="courses.php" style="color: white;">Courses</a></li>
                    <li><a href="blog.php" style="color: white;">Career Roadmaps</a></li>
                    <li><a href="main.php#about" style="color: white;">About Us</a></li>
                    <li><a href="contact.php" style="color: white;">Contact Us</a></li>
                    <li><a href="login.php" style="color: white;">Login</a></li>
                    <li><a href="register.php" style="color: white;">Register</a></li>
                </ul>
            </nav>
            <?php else: ?>
            <nav id="nav" style="text-align: center;">
                <ul class="main-menu nav navbar-nav" style="justify-content: center; gap: 15px; padding: 0; list-style: none;">
                    <li><a href="main.php" style="color: white;">Home</a></li>
                    <li><a href="http://127.0.0.1:5000/" style="color: white;">Career Prediction</a></li>
                    <li><a href="community.php" style="color: white;">Community</a></li>
                    <li><a href="courses.php" style="color: white;">Courses</a></li>
                    <li><a href="blog.php" style="color: white;">Career Roadmaps</a></li>
                    <li><a href="main.php#about" style="color: white;">About Us</a></li>
                    <li><a href="contact.php" style="color: white;">Contact Us</a></li>
                    <li><a href="logout.php" style="color: white;">Log out</a></li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>

    </div>
</header>

		<!-- /Header -->