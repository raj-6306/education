<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Contact | TheoremTrack</title>
	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Main CSS file -->
        <link rel="stylesheet" href="{{ url('assets/style.css') }}">

	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

</head>


<body>

	<div id="site-content">
		<header class="site-header">
			<div class="primary-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="{{ url('assets/images/logo1.png') }}" alt="Where Every Equation Finds Its Path." height="60px" width="60px">
						<h1 class="site-title">Where Every Equation Finds Its Path.</h1>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="/">Home</a></li>
							<!-- <li class="menu-item"><a href="course.html">Courses</a></li> -->
							<li class="menu-item current-menu-item"><a href="{{route('contact')}}">Contact</a></li>
							<li class="menu-item"><a href="{{route('login')}}">Login</a></li>
							<li class="menu-item"><a href="{{route('register')}}">Register</a></li>
						</ul>> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div> <!-- .container -->
			</div> <!-- .primary-header -->

			<div class="page-title">
				<div class="container">
					<h2>Contact Us</h2>
				</div>
			</div>
		</header>
	</div>

	<main class="main-content">
		<div class="fullwidth-block inner-content">
			<div class="container">
				<div class="map"></div>

				{{-- <div class="row">
					<div class="col-md-6">
						<form action="#" class="contact-form">
							<p>
								<label for="name">Name</label>
								<span class="control"><input type="text" id="name" placeholder="Yout name"></span>
							</p>
							<p>
								<label for="email">Email</label>
								<span class="control"><input type="text" id="email" placeholder="Email"></span>
							</p>
							<p>
								<label for="website">Website</label>
								<span class="control"><input type="text" id="website" placeholder="Website"></span>
							</p>
							<p>
								<label for="message">Name</label>
								<span class="control"><textarea id="message" placeholder="Message"></textarea></span>
							</p>
							<p class="text-right">
								<input type="submit" value="Send message">
							</p>
						</form>
					</div>
					<div class="col-md-6">
						<div class="contact-info">
							<address>
								<strong>Address</strong>
								<p>EduBuddies INC. <br>Mansarovar <br>Jaipur, Rajasthan</p>
							</address>
							<div class="contact">
								<strong>Contact</strong>
								<p>
									<a href="tel:532930098891">9958192420</a>
									<a href="mailto:office@companyname.com">office@EduBuddies.com</a> <br>

								</p>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div> <!-- .fullwidth-block -->
	</main>

	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">Contact us</h3>
						<address>Lorem ipsum dolor sit amet. <br> <br>Lorem ipsum dolor sit amet.</address>

						<a href="#">Lorem ipsum dolor sit amet.</a> <br>
						<a href="#">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, perspiciatis.</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">Social media</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<div class="social-links circle">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					{{-- <div class="widget">
						<h3 class="widget-title">Featured students</h3>
						<ul class="student-list">
							<li><a href="#">
									<img src="dummy/student-sm-1.jpg" alt="" class="avatar">
									<span class="fn">Sarah Branson</span>
									<span class="average">Average: 4,9</span>
								</a></li>
							<li><a href="#">
									<img src="dummy/student-sm-2.jpg" alt="" class="avatar">
									<span class="fn">Dorothy Smith</span>
									<span class="average">Average: 4,9</span>
								</a></li>
						</ul>
					</div> --}}
				</div>
				<div class="col-md-3">
					{{-- <div class="widget">
						<h3 class="widget-title">Newsletter</h3>
						<p>Aspernatur, rerum. Impedit, deleniti suscipit</p>
						<form action="#" class="subscribe">
							<input type="email" placeholder="Email Address...">
							<input type="submit" class="light" value="Subscribe">
						</form>
					</div> --}}
				</div>
			</div>

			{{-- <div class="copy">Copyright 2014 Lincoln High School. All rights reserved.</div> --}}
		</div>

	</footer>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="{{ url('assets/js/jquery-1.11.1.min.js') }}"></script>

        <!-- Plugins JS -->
        <script src="{{ url('assets/js/plugins.js') }}"></script>

        <!-- App JS -->
        <script src="{{ url('assets/js/app.js') }}"></script>

</body>

</html>