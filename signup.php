<?php
	include_once 'header.php';
?>

<section class="main-container">
<div class="main-wrapper">
 <div class="main-wrapperin">
	<form class="signup-form" action="includes/signup.inc.php" method="POST"> <!-- me to action dilono ti thelo na kanei efoson patithei to submit-->
		<h2>Sign Up</h2>
		<input type="text" name="first" placeholder="Firstname">
		<input type="text" name="last" placeholder="Lastname">
		<input type="text" name="email" placeholder="E-mail">
		<input type="text" name="uid" placeholder="Username">
		<input type="password" name="pwd" placeholder="Password">
		<button type="submit" name="submit">Sign Up</button>
	</form>
</div>
</div>
</section>

<?php
	include_once 'footer.php';
?>