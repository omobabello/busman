<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Busman Admin| Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo assets_url('css/bootstrap.css') ?>" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo assets_url('css/style.css') ?>" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="<?php echo assets_url('css/font-awesome.css') ?>" rel="stylesheet">
<!-- //font-awesome icons -->
 <!-- js-->
<script src="<?php echo assets_url('js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo assets_url('js/modernizr.custom.js') ?>"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<!--animate-->
<link href="<?php echo assets_url('css/animate.css') ?>" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo assets_url('js/wow.min.js') ?>"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="<?php echo assets_url('js/metisMenu.min.js') ?>"></script>
<script src="<?php echo assets_url('js/custom.js') ?>"></script>
<link href="<?php echo assets_url('css/custom.css') ?>" rel="stylesheet">
<!--//Metis Menu -->
</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->

		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--logo -->
				<div class="logo">
					<a href="<?php echo site_url() ?>">
						<h1>Busman</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->

				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Sign In Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back to Busman AdminPanel  </h4>
						<?php echo isset($message) ? $message : NULL ?>
					</div>
					<div class="login-body">
						<?php echo form_open('home/try_login') ?>
							<input type="text" class="user" name="email" value="<?php echo set_value('email')?>" placeholder="Enter your email" required="">
							<input type="password" name="password" class="lock" placeholder="Password">
							<input type="submit" name="Sign In" value="Sign In">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" value='TRUE'><i></i>Remember me</label>
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2017 Busman Admin Panel. All Rights Reserved</p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?php echo assets_url('js/classie.js') ?>"></script>
	<!--scrolling js-->
	<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
	<script src="<?php echo assets_url('js/scripts.js') ?>"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo assets_url('js/bootstrap.js') ?>"> </script>
</body>
</html>
