<?php
	
	
	$product_ids = array();
	//session_destroy(); //make sure the session is empty
	
	//check if Add to Card button has been submitted
	if(filter_input(INPUT_POST, 'add_to_cart')){
		if(isset($_SESSION['shopping_cart'])){ //check if shopping card exists
			
			//keep track of how many products are in the shopping cart
			$count = count($_SESSION['shopping_cart']);
			
			//create sequantial array for matching array keys to products id's
			$product_ids = array_column($_SESSION['shopping_cart'],'ids');
			
			if (!in_array(filter_input(INPUT_GET, 'ids'), $product_ids)){
			$_SESSION['shopping_cart'][$count] = array
				(
					'ids' => filter_input(INPUT_GET, 'ids'),
					'name' => filter_input(INPUT_POST, 'name'),
					'price' => filter_input(INPUT_POST, 'price'),
					'quantity' => filter_input(INPUT_POST, 'quantity')
				);
			}
			else {   //if the product already exists change the quantity to +1
				//match array key to id of the product being added to the cart
				for($i = 0; $i < count($product_ids); $i++){
					if($product_ids[$i] == filter_input(INPUT_GET, 'ids')){
						//add item quantity to the exixting product in the array
						$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
					}
				}
			}

		}
		else {  //if doesnt exist, creat first product with array key 0
			//create array using submitted form data,start from key 0 and fill it with values
			$_SESSION['shopping_cart'][0] = array
			(
				'ids' => filter_input(INPUT_GET, 'ids'),
				'name' => filter_input(INPUT_POST, 'name'),
				'price' => filter_input(INPUT_POST, 'price'),
				'quantity' => filter_input(INPUT_POST, 'quantity')
			);
		}
	}
	
	if(filter_input(INPUT_GET, 'action') == 'delete') { //if the remove button has been clicked
		//loop through all products in the shopping cart until is matches with GET id variable
		foreach($_SESSION['shopping_cart'] as $key => $product){
			if ($product['ids'] == filter_input(INPUT_GET, 'ids')){
				//remove product from the shoppng cart when it matches with the GET id
				unset($_SESSION['shopping_cart'][$key]);
			}
		}
		//reset session array keys so they match the $product_ids numeric array
		$_SESSION['shopping'] = array_values($_SESSION['shopping_cart']);
	}
	
	//pre_r($_SESSION);
	
	function pre_r($array){
		echo '<pre>' ;
		print_r($array);
		echo '</pre>';
	}
?>

<!DOCTYPE html>

<html>
	<head>
		<title> Placebo eShop </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- idio me tin proigoumeni seira, mporei kai perito -->
		<link href="css/eshop-style-main.css" rel="stylesheet"> <!-- Proto css arxeio -->
		<link href="cart-style.css" rel="stylesheet"> <!-- deytero css arxeio -->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"> <!-- scalable on all devices -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- using jquery instead of javascript -->
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		
		
		<!-- Top Nav Bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="index.html">Return To WebSite</a>
				</div>
				
				<ul class="nav navbar-nav">
				  <li class="active"><a href="cart.php">Placebo's eShop</a></li><!-- listed items -->
				 
				</ul>
				
			</div>
		</nav>

		<!-- Header -->
		<div id="headerWrapper">
			<div id="logotext"></div>	
		</div>
		
		<div class="container">
			
			
		
			<?php
				/*sindesi me tin basi*/
				$connect = mysqli_connect('localhost','manager','6958731997A.m','cart');
				$query = 'SELECT * FROM products ORDER by ids ASC';
				$result = mysqli_query($connect,$query);
				

				if ($result):
					if(mysqli_num_rows($result)>0):
						
						while($product = mysqli_fetch_assoc($result)):
						?>
							
							<div class="col-sm-4 col-md-3">
								<form method="post" action="loginindex.php?action=add&ids=<?php echo $product['ids']; ?>">
									<div class="products">
										<img src=" <?php echo $product['image']; ?>"  class="img-thumb" />
										<h4 class="text-dark"><?php echo $product['name']; ?></h4>
										<h4> $ <?php echo $product['price']; ?> </h4>
										<input type="text" name="quantity" class="form-control" value="1" />
										<input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
										<input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
										<input type="submit" name="add_to_cart" style = "margin-top:5px;" class="btn btn-dark" 
												value="Add to card" />
									</div>
									
								</form>
							</div>
						
						<?php
						endwhile;
					endif;
				endif;
			?>
			
			<div style="clear:both"></div>
			<br/>
			<div class="table-responsive">
			<table class="table">
				<tr><th colspan="5"><h3>Order Details</h3></th></tr>
			<tr>
				<th width="40%">Product Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price</th>
				<th width="15%">Total</th>
				<th width="5%">Action</th>
			</tr>
			
			<!-- Making sure that the shopping cart is not empty -->
			<?php
				if(!empty($_SESSION['shopping_cart'])):
			
				$total = 0;
				
				foreach($_SESSION['shopping_cart'] as $key => $product):
			?>
			
			<tr>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['quantity']; ?></td>	
				<td>$<?php echo $product['price']; ?></td>
				<td>$<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
				<td>
					<a href="loginindex.php?action=delete&ids=<?php echo $product['ids']; ?>">
						<div class="btn-danger">Remove</div>
					</a>
				</td>
			</tr>
			
			<?php
					$total = $total + ($product['quantity'] * $product['price']);
					
				endforeach;
			?>
			
			<tr>
				<td colspan="3" align="right">Total</td>
				<td align="right">$ <?php echo number_format($total, 2); ?> </td>
				<td></td>
			</tr>
			
			<tr>
				<!-- Show chechout button only if the shopping cart is not empty -->
				<td colspan="5">
					<?php
						if (isset($_SESSION['shopping_cart'])):
						if (count($_SESSION['shopping_cart']) > 0):
					?>
						<a href= "#" class="button"> Checkout </a>
					<?php endif; endif; ?>
				</td>
			</tr>
			
			<?php
			endif;
			?>
			</table>
			</div>
			
		</div>
		
		
	</body>

</html>

