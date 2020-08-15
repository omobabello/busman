<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Busman | Register</title>
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
					<a href="#">
						<h1>Busman</h1>
						<span>AdminPanel</span>
					</a>
				</div>
				<!--//logo-->

				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">SignUp Here</h3>
				<p class="creating">Join Majority of Bus owners. Get Passengers with Ease</p>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
          <?php echo form_open('home/register') ?>
				<?php echo validation_errors("<p class='alert alert-danger'>","</p>") ?>

					<div class="sign-u">
						<div class="sign-up1">
							<h4>Organisation <span class='label-dager'>*</span> :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" name='name' value="<?php echo set_value('name') ?>" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email <span class='label-dager'>*</span> :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" name='email' value="<?php echo set_value('email') ?>" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Phone number :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" name='phone' value="<?php echo set_value('phone') ?>" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Address :</h4>
						</div>
						<div class="sign-up2">
							<textarea name='address' class='formcontrol1'>
                  <?php echo set_value('address') ?>
							</textarea>
						</div>
						<div class="clearfix"> </div>
					</div>
					<h6>Login Information :</h6>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" name='password'  value="<?php echo set_value('password') ?>" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Re-Password* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" name='passconf' required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
							<input type="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
      <?php echo form_close() ?>
		</div>
<!--footer-->
<div class="footer">
   <p>&copy; 2017 Busman Admin Panel. All Rights Reserved </p>
</div>
    <!--//footer-->
</div>
<!-- Classie -->
<script src="<?php echo assets_url('js/classie.js') ?>"></script>
<script>
  var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
    showLeftPush = document.getElementById( 'showLeftPush' ),
    body = document.body;

  showLeftPush.onclick = function() {
    classie.toggle( this, 'active' );
    classie.toggle( body, 'cbp-spmenu-push-toright' );
    classie.toggle( menuLeft, 'cbp-spmenu-open' );
    disableOther( 'showLeftPush' );
  };

  function disableOther( button ) {
    if( button !== 'showLeftPush' ) {
      classie.toggle( showLeftPush, 'disabled' );
    }
  }
</script>
<!--scrolling js-->
<script src="<?php echo assets_url('js/jquery.nicescroll.js') ?>"></script>
<script src="<?php echo assets_url('js/scripts.js') ?>"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo assets_url('js/bootstrap.js') ?>"> </script>
</body>
</html>
