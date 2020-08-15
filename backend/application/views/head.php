<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $title ?></title>
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
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="<?php echo site_url('home/home')?>"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-folder-open nav_icon"></i>Bookings<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="<?php echo site_url('home/today_bookings') ?>">Today</a>
								</li>
                <li>
									<a href="<?php echo site_url('home/month_bookings') ?>">This Month</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>
						<li>
							<a href="<?php echo site_url('home/buses') ?>"><i class="fa fa-truck nav_icon"></i>Buses</a>
						</li>
            <li>
							<a href="<?php echo site_url('home/routes') ?>"><i class="fa fa-road nav_icon"></i>Routes</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-book nav_icon"></i>Accounts <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="<?php echo site_url('home/account_mon') ?>">Monthly</a>
								</li>
								<li>
									<a href="<?php echo site_url('home/account_year') ?>">Yearly</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo site_url('home/logout') ?>"><i class="fa fa-road nav_icon"></i>Logout</a>
						</li>
					</ul>
					<div class="clearfix"> </div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="<?php echo site_url('home/home') ?>">
						<h1>Busman</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
