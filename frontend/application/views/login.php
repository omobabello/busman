<html>
<head>
<title>Busman - Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?php echo base_url('assets/css/loginstrap.css') ?>" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="<?php echo base_url('assets/css/loginstyle.css') ?>" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="<?php echo base_url('assets/js/jquery-2.1.1.min.js') ?>"></script> 
<!--icons-css-->
<link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
				<?php echo form_open('home/login') ?>
					<input type="text" name="email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
                                        <?php echo form_submit('Sign In', 'Login') ?>
                                        <h3>Not a member?<a href="<?php echo site_url('home/signup') ?>"> Sign up now</a></h3>
				<?php echo form_close() ?>
				<h5><a href="<?php echo site_url() ?>">Go Back to Home</a></h5>
                                <?php echo validation_errors(); ?>
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Busman  </p>
</div>	
<!--COPY rights end here-->

<!--scrolling js-->
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
		<!--//scrolling js-->
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
