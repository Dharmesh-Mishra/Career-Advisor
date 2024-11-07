<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Background Image -->
			<!-- <div class="bg-image bg-parallax overlay" style="background-image:url(./img/bgc2.jpg); "></div> -->
			<!-- /Background Image -->

			<!-- <div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="main.html">Home</a></li>
							<li>Contact</li>
						</ul>
						<h1 class="white-text">Get In Touch</h1>
					</div>
				</div>
			</div>
		</div> -->
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>Send A Message</h4>
							<form id="contactForm" onsubmit="return validateForm()">
								<input class="input" type="text" name="name" placeholder="Name" id="name">
								<input class="input" type="email" name="email" placeholder="Email" id="email">
								<input class="input" type="text" name="subject" placeholder="Subject" id="subject">
								<textarea class="input" name="message" placeholder="Enter your Message" id="message"></textarea>
								<button type="submit" class="main-button icon-button pull-right">Send Message</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Contact Information</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>Guidance@gmail.com</li>
							<li><i class="fa fa-phone"></i>9876543210</li>
							<li><i class="fa fa-map-marker"></i>Andheri west</li>
						</ul>

						<!-- contact map -->
						<iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.6060114799902!2d72.83352037502867!3d19.124932582089755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9d90fffffff%3A0xb336106f9c10343e!2sBhavan&#39;s%20College!5e0!3m2!1sen!2sin!4v1728571360561!5m2!1sen!2sin" 
        width="600" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
						<!-- /contact map -->
					</div>
					<!-- contact information -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Contact -->

		<!-- Footer -->
		<!-- <footer id="footer" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- footer logo -->
					<!-- <div class="col-md-6">
						<div class="footer-logo">
							<a class="logo" style="font-size: 30px;" href="main.php">Intelligent I.T. Career Advisor</a>
						</div>
					</div> -->
					<!-- footer logo -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer> -->
		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script type="text/javascript" src="js/google-map.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<!-- Form validation script -->
		<script>
			function validateForm() {
				var name = document.getElementById("name").value;
				var email = document.getElementById("email").value;
				var subject = document.getElementById("subject").value;
				var message = document.getElementById("message").value;

				// Validate if fields are empty
				if (name == "" || email == "" || subject == "" || message == "") {
					alert("All fields must be filled out.");
					return false;
				}

				// Email format validation
				var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
				if (!email.match(emailPattern)) {
					alert("Please enter a valid email address.");
					return false;
				}

				// Show success alert if validation passes
				alert("Your message has been sent!");
				return true;
			}
		</script>
	</body>
</html>