<?php
// Start the session
session_start();
// Create an array for the shopping cart in the session
if (!isset($_SESSION['shoppingCart'])) {
 $_SESSION['shoppingCart'] = array();
 $_SESSION['products'] = array();
 }
?>
<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>Browse Products Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 <?php
 /*
 echo "<br><h1>1</h1>";
 var_dump($_SESSION);
 echo "<br>";
 echo "<br>";
 echo "<br>";
 
 
 echo "<br>";
 
 echo "<br><h1>2</h1>";
 var_dump($_SESSION);
 echo "<br>";
 echo "<br>";
 echo "<br>";
 */
 
 
 if (!isset($products)) {
 $products = array(
 array(
 "numberOfProduct" => 1,
 "title" => "Smartphone",
 "image" => "product_images/cellphone-cellular-device-50684.jpg",
 "price" => 500,
 "description" => "Full Screen Unlocked Smartphone|5.7 Android Dual SIM Cell Phones, 512 RAM/512 ROM, GSM 2G",
 "stock" => 10,
 "addedToCart" => 0
 ),
 array(
 "numberOfProduct" => 2,
 "title" => "Watch",
 "image" => "product_images/blur-brass-bronze-2113994.jpg",
 "price" => 100,
 "description" => "Original Mens Watch Analog Watch Dial, Pro Sport Diver with Screw Down Crown and Water Resistant to 200M",
 "stock" => 30,
 "addedToCart" => 0
 ),
 array(
 "numberOfProduct" => 3,
 "title" => "Binoculars",
 "image" => "product_images/binoculars-black-equipment-55804.jpg",
 "price" => 150,
 "description" => "Black|25x magnifucation porro prism binocular|50mm objective lens|ultra sharp focus across the field of view| suitable for astronomical viewing|protective rubber covering",
 "stock" => 20,
 "addedToCart" => 0
 )
 );
 }
 
 
 if (!isset($_SESSION['products'][0])) {
  $_SESSION['products'][] = $products;
 }
 
 /*
 echo "<br><h1>3</h1>";
 var_dump($_SESSION);
 echo "<br>";
 echo "<br>";
 echo "<br>";
 */
 
 $productNumber = $_SESSION['products'][0]['numberOfProduct'];
 
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addToShoppingCart'])) {
		
		/*
		$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
		$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
		
		
		$quantity = count($_SESSION['shoppingCart']);
		$i = $quantity - 1;
		*/
		
		$numberOfProducts = count($_SESSION['shoppingCart']);
		$addProduct = true;
		
		if($numberOfProducts > 0) {
			
	
			for($i = 0; $i < $numberOfProducts; $i++) {
				 foreach ($_SESSION['shoppingCart'][$i] as $productItem){
					if ($_SESSION['shoppingCart'][$i]['numberOfProduct'] == $_SESSION['products'][0][$productNumber - 1]) {
						
						$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
						$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
						$_SESSION['shoppingCart'][$i]['stock'] -= 1;
						$_SESSION['shoppingCart'][$i]['addedToCart'] += 1;
						$_SESSION['stock'] -= 1;
						$_SESSION['addedToCart'] += 1;
						
						$addProduct = false;
					}
						break;
					}
				}
				if($addProduct) {
					$numberOfProducts = count($_SESSION['shoppingCart']);
					$j = $numberOfProducts;
					$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
					$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
						$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
						$_SESSION['shoppingCart'][$j]['stock'] -= 1;
						$_SESSION['shoppingCart'][$j]['addedToCart'] += 1;
						$_SESSION['stock'] -= 1;
						$_SESSION['addedToCart'] += 1;
				}
		} else {
			$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
			
			$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
			$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
			$_SESSION['shoppingCart'][0]['stock'] -= 1;
			$_SESSION['shoppingCart'][0]['addedToCart'] += 1;
			$_SESSION['stock'] -= 1;
			$_SESSION['addedToCart'] += 1;
			
		}
 
 
 $i = 0;
 foreach ($_SESSION['products'][$i] as $product) {
	echo '<section><h2>'.$product["title"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["description"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="title" value="'.$product["title"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="description" value="'.$product["description"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="number" value="'.$product["numberOfProduct"].
	'"><input type="hidden" name="addedToCart" value="'.$product["addedToCart"].
	'"><input type="submit" name="productDetails" value="Product details"></form><form action="browse_products.php" method="post"><input type="submit" name="addToShoppingCart" value="Add to Shopping Cart"></form></div></article></section>';
 $i++;
 };
 
 ?>
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>