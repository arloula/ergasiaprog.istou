<!DOCTYPE html>
<html>
<head>
	<title> Placebo eShop </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/eshop-style-main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> <!-- scalable on all devices -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- using jquery instead of javascript -->
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Top Nav Bar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="index.php">Return To WebSite</a>
		</div>
		<ul class="nav navbar-nav"> <!-- unlisted items -->
		  <li class="active"><a href="eshop.php">eShop</a></li><!-- listed items -->
		  <li><a href="eshop1.php">A PLACE FOR US TO DREAM</a></li>
		  <li><a href="eshop2.php">CLOTHING</a></li>
		  <li><a href="#">ACCESSORIES</a></li>
		  <li><a href="#">MEDIA</a></li>
		</ul>
	  </div>
	</nav>

	<!-- Header -->
	<div id="headerWrapper">
		<div id="logotext"></div>	
	</div>


	<div class="container-fluid">
		<!-- left Sidebar -->
		<div class="col-md-2">Left Side Bar</div>
		
		<!-- main content -->
		<div class="col-md-8">
			main
		</div>
		
		<!-- right Sidebar -->
		<div class="col-md-2">Right Side Bar</div>
	</div>

	<!-- javascript -->
	<script>
		jQuery(window).scroll(function(){
			var vscroll = jQuery(this).scrollTop();
			jQuery('#logotext').css({
				"transform" : "translate(0px,"+vscroll/2+"px)"
			})
		});
	</script>	
</body>

</html>