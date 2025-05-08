<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>TheoremTrack</title>
	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Main CSS file -->
        <link rel="stylesheet" href="{{ url('assets/style.css') }}">

	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
		<style>
	.home-slider .slider {
    position: relative;
    display: flex;
    align-items: center; /* Vertically align items in the center */
    justify-content: flex-start; /* Align content to the left */
}

.home-slider .slides {
    display: flex;
    overflow: hidden;
    width: 100%;
}

.home-slider .slides li {
    display: flex;
    width: 100%;
    justify-content: flex-start; /* Align content to the left */
}

.home-slider .slide-caption {
    max-width: 50%; /* Adjust this value to control caption width */
    padding: 20px;
    position: relative;
    z-index: 2;
}

.home-slider .slide-caption h2 {
    font-size: 2rem;
    font-weight: bold;
}

.home-slider .slide-caption p {
    font-size: 1rem;
    margin-bottom: 15px;
}

.home-slider .slide-caption .button {
    padding: 10px 20px;
    /* background-color: #60794e; Example primary color */
    color: black;
    border-radius: 5px;
    text-decoration: none;
}

.home-slider .slides img {
    width: 50%; /* Adjust this value based on how much space you want the image to take */
    object-fit: cover;
    position: absolute;
    right: 0; /* Align image to the right */
    z-index: 1;
}

		</style>
</head>


<body>

	<div id="site-content">
		<header class="site-header">
			<div class="primary-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="{{ url('assets/images/logo1.png') }}" alt="Where Every Equation Finds Its Path." height="80px" width="80px">
						<h1 class="site-title"></h1>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="/">Home</a></li>
							<!-- <li class="menu-item"><a href="course.html">Courses</a></li> -->
							{{-- <li class="menu-item"><a href="{{route('contact')}}">Contact</a></li> --}}
							<li class="menu-item"><a href="{{route('login')}}">Login</a></li>
							<li class="menu-item"><a href="{{route('register')}}">Register</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div> <!-- .container -->
			</div> <!-- .primary-header -->

			<div class="home-slider">
				<div class="container">
					<div class="slider">
						<ul class="slides">
							<li>
								<div class="slide-caption">
									<h2 class="slide-title">TheoremTrack! <br> Where Every Equation Finds Its Path.!</h2>
									<p>Whether you're a student aiming to master tough concepts or a parent looking to support your child’s progress, Theorem Track brings education to your fingertips—anytime, anywhere.</p>
									{{-- <a href="#" class="button primary large">Learn more</a> --}}
									<br/><br/>
								</div>
								<img src="{{ url('assets/dummy/slider.jpg') }}" alt="">
							</li>
							<li>
								<div class="slide-caption">
									<h2 class="slide-title">TheoremTrack! <br> Where Every Equation Finds Its Path.!</h2>
									<p>Whether you're a student aiming to master tough concepts or a parent looking to support your child’s progress, Theorem Track brings education to your fingertips—anytime, anywhere.</p>
									{{-- <a href="#" class="button primary large">Learn more</a> --}}
									<br/><br/>
								</div>
								<img src="{{ url('assets/dummy/slider1.jpg') }}" alt="" >
							</li>
							<li>
								<div class="slide-caption">
									<h2 class="slide-title">TheoremTrack! <br> Where Every Equation Finds Its Path.!</h2>
									<p>Whether you're a student aiming to master tough concepts or a parent looking to support your child’s progress, Theorem Track brings education to your fingertips—anytime, anywhere.</p>
									{{-- <a href="#" class="button primary large">Learn more</a> --}}
									<br/><br/>
								</div>
								<img src="{{ url('assets/dummy/slider2.jpg') }}" alt="" >
							</li>
						</ul> <!-- .slides -->
					</div> <!-- .slider -->
				</div> <!-- .container -->
			</div> <!-- .home-slider -->
		</header>
	</div>

	<main class="main-content">
		<div class="fullwidth-block">
			<div class="container">
				{{-- <div class="row">
					<div class="col-md-4">
						<h2 class="section-title"><i class="icon-newspaper"></i> Latest News</h2>
						<ul class="posts">
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="author"><i class="icon-user"></i>Marco Baletti</span>
							</li>
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="author"><i class="icon-user"></i>Marco Baletti</span>
							</li>
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="author"><i class="icon-user"></i>Marco Baletti</span>
							</li>
						</ul>
						<p class="text-center">
							<a href="#" class="more button secondary">See older News</a>
						</p>
					</div>
					<div class="col-md-4">
						<h2 class="section-title"><i class="icon-calendar-lg"></i> Upcoming Events</h2>
						<ul class="posts">
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</li>
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</li>
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="location"><i class="icon-map-marker"></i>Yankee Stadium</span>
							</li>
						</ul>
						<p class="text-center">
							<a href="#" class="more button secondary">See more event</a>
						</p>
					</div>
					<div class="col-md-4">
						<h2 class="section-title"><i class="icon-book"></i> Courses</h2>
						<ul class="posts">
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="time"><i class="icon-clock"></i>1:00pm-2:00pm</span>
								<span class="price"><i class="icon-coins"></i>$55.00</span>
							</li>
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="time"><i class="icon-clock"></i>1:00pm-2:00pm</span>
								<span class="price"><i class="icon-coins"></i>$55.00</span>
							</li>
							<li class="post">
								<h3 class="entry-title"><a href="#">Nostrud exercitation ullamco</a></h3>
								<span class="date"><i class="icon-calendar"></i> 6 APR 2014</span>
								<span class="time"><i class="icon-clock"></i>1:00pm-2:00pm</span>
								<span class="price"><i class="icon-coins"></i>$55.00</span>
							</li>
						</ul>
						<p class="text-center">
							<a href="#" class="more button secondary">See more courses</a>
						</p>
					</div>
				</div> <!-- .row --> --}}
			</div>
		</div> <!-- .fullwidth-block -->

		<div class="fullwidth-block">
			<div class="container">
				<div class="row">
					{{-- <div class="col-md-6"> --}}
						{{-- <div class="boxed-section request-form">
							<h2 class="section-title text-center">Request information</h2>
							<form action="#">
								<div class="field">
									<label for="email">Email Address:</label>
									<div class="control"><input type="text" id="email" placeholder="example@mail.com">
									</div>
								</div>
								<div class="field">
									<label for="name">Your name:</label>
									<div class="control"><input type="text" id="name" placeholder="John Smith"></div>
								</div>
								<div class="field">
									<label for="interest">Campus of Interest</label>
									<div class="control">
										<select name="#" id="interest">
											<option value="other">Other</option>
											<option value="other">Phisycs</option>
											<option value="other">Chemystry</option>
											<option value="other">Art</option>
										</select>
									</div>
								</div>
								<div class="field">
									<label for="program">Program of Interest</label>
									<div class="control">
										<select name="#" id="program">
											<option value="other">Other</option>
											<option value="other">Phisycs</option>
											<option value="other">Chemystry</option>
											<option value="other">Art</option>
										</select>
									</div>
								</div>
								<div class="field no-label">
									<div class="control">
										<input type="submit" class="button" value="Submit request">
									</div>
								</div>
							</form>
						</div> <!-- .boxed-section .request-form --> --}}
						{{-- <div class="boxed-section">
							<img src="{{ url('assets/dummy/img1.jpg') }}" class="img-fluid rounded" alt="Student Image" style="height: 300px;width:475px;">
							<p class="mt-3">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
								Vestibulum in sapien sed enim egestas feugiat. 
								Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
							</p>
						</div> --}}
					{{-- </div> --}}
					<div class="col-md-12">
						<div class="boxed-section best-students">
							{{-- <h2 class="section-title  text-center">Our best students</h2> --}}
							{{-- <ul class="best-students-grid">
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img1.jpg') }}" alt="student 1"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img2.jpg') }}" alt="student 2"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img3.jpg') }}" alt="student 3"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img1.jpg') }}" alt="student 1"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img2.jpg') }}" alt="student 2"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img3.jpg') }}" alt="student 3"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img4.jpg') }}" alt="student 4"></a>
								</li>
								<li class="student"><a href="#"><img src="{{ url('assets/dummy/img5.jpeg') }}" alt="student 5"></a>
								</li>
								<li class="student"><a href="#" class="more-student" style="height: 100px;">See more</a></li>
							</ul> --}}
							<video src="{{ url('assets/video.mp4') }}" style="height: 100%;width:100%;" autoplay muted controls></video>
						</div> <!-- .boxed-section .best-students -->
					</div>
				</div> <!-- .row -->
			</div> <!-- .container -->
		</div> <!-- .fullwidth-block -->
	</main>

	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					{{-- <div class="widget">
						<h3 class="widget-title">Contact us</h3>
						<address>Lorem ipsum dolor sit amet. <br> <br>Lorem ipsum dolor sit amet.</address>

						<a href="#">Lorem ipsum dolor sit amet.</a> <br>
						<a href="#">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, perspiciatis.</a>
					</div> --}}
				</div>
				<div class="col-md-3">
					{{-- <div class="widget">
						<h3 class="widget-title">Social media</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<div class="social-links circle">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div> --}}
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

	<script src="{{ url('assets/js/jquery-1.11.1.min.js') }}"></script>

        <!-- Plugins JS -->
        <script src="{{ url('assets/js/plugins.js') }}"></script>

        <!-- App JS -->
        <script src="{{ url('assets/js/app.js') }}"></script>

</body>

</html>