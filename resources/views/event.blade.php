<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Events | Lincoln High School</title>
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
							<img src="images/logo.png" alt="Lincoln high School">
							<h1 class="site-title">Lincoln High School</h1>
						</a> <!-- #branding -->
						
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item"><a href="/">Home</a></li>
								<li class="menu-item current-menu-item"><a href="{{route('courses')}}">Courses</a></li>
								<li class="menu-item"><a href="{{route('student')}}">Students</a></li>
								<li class="menu-item current-menu-item"><a href="{{route('event')}}">Events</a></li>
								<li class="menu-item"><a href="contact.html">Contact</a></li>
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
					</div> <!-- .container -->
				</div> <!-- .primary-header -->

				<div class="page-title">
					<div class="container">
						<h2>Our events are perfect</h2>
					</div>
				</div>
			</header>
		</div>

		<main class="main-content">
			<div class="fullwidth-block inner-content">
				<div class="container">
					<div class="fullwidth-content">
						<h2 class="section-title"><i class="icon-calendar-lg"></i> Upcoming events</h2>

						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Blanditiis voluptatum deleniti</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero.</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Corrupti quos dolores et quas molestias</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero.</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Voluptates repudiandae sint</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero.</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Voluptatum deleniti blanditiis</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero.</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Neniet ut et voluptates repudiandae sint et molestiae</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero.</p>
							</div>
						</div>
						<div class="accordion">
							<div class="accordion-toggle">
								<h3>Blanditiis voluptatum deleniti</h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</div>
							<div class="accordion-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus totam quaerat, accusantium soluta facilis sequi quis ex nostrum, consequuntur odio ea. Eaque molestiae earum saepe, qui accusamus voluptate sed libero.</p>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .fullwidth-block -->
		</main>

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Contact us</h3>
							<address>Lincoln High School <br>745 Jewel Ave Street <br>Fress Meadows, NY 1136</address>

							<a href="mailto:info@lincolnhighschool.com">info@lincolnhighschool.com</a> <br>
							<a href="tel:48942652394324">(489) 42652394324</a>
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
						<div class="widget">
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
						</div>
					</div>
					<div class="col-md-3">
						<div class="widget">
							<h3 class="widget-title">Newsletter</h3>
							<p>Aspernatur, rerum. Impedit, deleniti suscipit</p>
							<form action="#" class="subscribe">
								<input type="email" placeholder="Email Address...">
								<input type="submit" class="light" value="Subscribe">
							</form>
						</div>
					</div>
				</div>

				<div class="copy">Copyright 2014 Lincoln High School. All rights reserved.</div>
			</div>

		</footer>

		<script src="{{ url('assets/js/jquery-1.11.1.min.js') }}"></script>

        <!-- Plugins JS -->
        <script src="{{ url('assets/js/plugins.js') }}"></script>

        <!-- App JS -->
        <script src="{{ url('assets/js/app.js') }}"></script>
		
	</body>

</html>