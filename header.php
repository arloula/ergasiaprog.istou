<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">

</head>

<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<?php if(!isset($_SESSION['u_id'])) { ?>
				<li> <a href="index.html"> Return To WebSite </a> </li>
				  <!-- href-eshop.php -->
				<?php } ?>
			</ul>
			<div class="nav-login">
				<?php
					if(isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
					}	else {
							echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="Username/email">
								<input type="password" name="pwd" placeholder="Password">
								<button type="submit" name="submit">Log in</button>
								</form>
								<a href="signup.php">Sign up</a>';
						
					}
				?>
				
						
			
			</div>
		
		
		</div>
	</nav>


</header>

