<?php
	include_once 'header.php';
?>

<section class="main-container">
<div class="main-wrapper">
	<?php
		if(isset($_SESSION['u_id'])) {
			include 'cart.php';
		
		}
	?>
</div>
	<?php
	if(!isset($_SESSION['u_id'])) { ?>
		<div id="headerWrapper">
		<div id="logotext"></div>	
		</div>
	<?php } ?>
</section>

<?php
	include_once 'footer.php';
?>