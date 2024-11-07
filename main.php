<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'?>
        <!-- Home -->
		<div id="home" class="hero-area">

    <!-- Background Image -->
	<div class="bg-image bg-parallax overlay" style="background-image:url(./img/d2.png); background-color:#000000cf; padding-top:50rem; width:100%; height: 650px; margin-top: 50px;"></div>
    <!-- /Background Image -->

    <div class="home-wrapper" style="padding: 60px 0;"> <!-- Added padding for vertical spacing -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <!-- Adjusted Title -->
                    <h1 class="white-text" style="
                        font-size: 80px;  /* Larger font */
                        margin-top: 50px; /* Space from the top */
                        margin-bottom: 30px; /* Space below the title */
                        line-height: 1.2;  /* Adjust line spacing */
						padding-top:10rem;
                    ">
                        Intelligent <br>I.T.<br>Career Advisor
                    </h1>

                    <!-- Conditional Welcome Text and Button -->
                    <?php
                    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true): ?>
                        <p class="lead white-text" style="
                            font-size: 22px; 
                            margin-left: 5px; 
                            margin-top: 20px; /* Added margin above text */
                            margin-bottom: 40px; /* Added margin below text */
                        ">
                            <b>Discover yourself<br>
                            Take the test to find the perfect role for you after<br>I.T Engineering</b> <!-- Added <br> for better break -->
                        </p>
						<a class="main-button icon-button" href="login.php" style="margin-top: 20px;">Get Started!</a>
                    <?php else: ?>
                        <p class="lead white-text" style="
                            font-size: 22px; 
                            margin-left: 5px; 
                            margin-top: 20px; /* Added margin above text */
                            margin-bottom: 40px; /* Added margin below text */
                        ">
                            <b>Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?>!<br>
                            Discover yourself,<br>
                            Take the test to find the perfect role for you after<br>I.T Engineering</b> <!-- Added <br> for better break -->
                        </p>
						<a class="main-button icon-button" href="login.php" style="margin-top: 20px;">Get Started!</a>
                  <?php endif ?>

                </div>
            </div>
        </div>
    </div>

</div>

		<!-- /Home -->



        <!-- Why us -->
		<div id="why-us" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
					<div class="section-header text-center">
					

						<h2 style="margin-top: 100px; font-size: 45px;">Welcome to Intelligent I.T Career Advisor</h2>
						<!--<p class="lead">We all want to fly high and in real time!<br> And in this random pursuit of success, we end up making wrong career choices.</p>-->
						<p class="lead"><b style="color: rgb(56, 48, 48);">Career Adviso</b> is one stop destination <br>in helping you understand yourself, the best career for you <br> and providing all the resources in the process.</p>
					</div>
				</div>	

				<div class="row">
					<!-- feature -->
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa "><span> &#x1F50E;&#xFE0E;</span></i>
							<div class="feature-content">
								<a href="#" >
								<?php
								// Check if the user is logged in, if not then redirect him to login page
								if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true):?>
									<a href="login.php"><h4>Career Prediction</h4></a>
								<?php else: ?>
									<a href="http://127.0.0.1:5000/"><h4>Career Prediction</h4></a>
									
								
							<?php endif ?>
								
								<p>Take the test to find the perfect role for you after Engineering.</p>
							</div>
						</div>
					</div>
					<!-- /feature -->
					
					<!-- feature -->
					<div class="col-md-4">
						<div class="feature">
						<i class="feature-icon fa "><span>&#x1F50E;&#xFE0E;</span></i>
							<div class="feature-content">
								<a href="blog.php" >
								<h4>Knowledge Network</h4>
								</a>
								<p>Gain knowledge through various sources, like important informational links, access to study materials, etc.</p>
							</div>
						</div>
					</div>
					<!-- /feature -->

					<!-- feature -->
					<div class="col-md-4">
						<div class="feature">
						<i class="feature-icon fa "><span>&#x1F50E;&#xFE0E;</span></i>
							<div class="feature-content">
								<a href="courses.php" >
								<h4>Online Courses</h4>
								</a>
								<p>Links to relevant Courses.</p>
							</div>
						</div>
					</div>
					<!-- /feature -->
									
				</div>
				<!-- /row -->
				
				<hr class="section-hr">

			</div>
			<!-- /container -->

		</div>
		<!-- /Why us -->

		<!-- Call To Action -->
		<div id="cta" class="section" style="height: 400px;">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/bgmid.jpg)"></div>
			<!-- /Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
					
						
							<?php
								// Check if the user is logged in, if not then redirect him to login page
								if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true):?>
									<h2 class="white-text" style="font-size: 30px; width:700px ;">Hi,</h2>

									<h2 class="white-text" style="font-size: 25px; width:700px ; margin-top:10px;">Your Career Path Begins Here</h2>
									<p class="lead white-text" >We Create Beautiful Experiences
										That Drive Successful Careers.</p>
									<a class="main-button icon-button" href="register.php">Get Started!</a>
								<?php else: ?>
									<h2 class="white-text" style="font-size: 30px; width:700px ;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?> !</b></h2>

								<h2 class="white-text" style="font-size: 25px; width:700px ; margin-top:10px;">Your Career Path Begins Here</h2>
								<p class="lead white-text" >We Create Beautiful Experiences
									That Drive Successful Careers.</p>
									<a class="main-button icon-button" href="main.php">Get Started!</a>
									
							<?php endif ?>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Call To Action -->

		<!-- About -->
		<div id="about" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<div class="section-header">
							<h2 style="font-size: 35px;">ABOUT US</h2>
							<p class="lead" style="font-size: 18px; font-style: italic; margin-top: 50px;">At Intelligent IT Career Advisor, we combine Machine Learning with user-driven assessments to help individuals find their ideal career path in the IT industry. By evaluating both self-reported skill levels and objective assessments across key IT domains, our system offers personalized career recommendations tailored to each user’s strengths and interests. Whether you’re an IT student, a recent graduate, or a professional looking to pivot careers, our goal is to provide data-driven insights that bridge the gap between education and industry needs. We're here to help you navigate the dynamic world of IT and make informed decisions about your career journey.</p>
							<!--Education seekers get a personalised experience on our site, based on educational background and career interest, enabling them to make well informed course and college decisions. The decision making is empowered with easy access to detailed information on career choices, courses, exams, colleges, admission criteria, eligibility, fees, placement statistics, rankings, reviews, scholarships, latest updates etc as well as by interacting with other Shiksha.com users, experts, current students in colleges and alumni groups. We have introduced several student oriented products and tools like Career Central, Common Application Form, Top Colleges, College Compare, Alumni Employment Stats, Campus Connect, College Reviews, College Predictors, MyShortlist and Shiksha Café.-->
						</div>

					</div>

					<div class="col-md-6">
						<div class="about-img">
							<img src="./img/d1.png" alt="">
						</div>
					</div>

				</div>
				<!-- row -->
				<hr class="section-hr">
			</div>
			<!-- container -->
		</div>
		<!-- /About -->

		<!-- Contact CTA -->
		<div id="contact-cta" class="section" style="height: 400px;">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/d3.png)"></div>
			<!-- Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-8 col-md-offset-2 text-center">
						<h2 class="white-text">Contact Us</h2>
						<p class="lead white-text">Help us to get to know you.</p>
						<a class="main-button icon-button" href="contact.php">Contact Us Now</a>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact CTA -->

<?php include 'footer.php'?>
</html>
