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
  <title>View Cart Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 <?php
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
 
 // Add the 1st product
 //$_SESSION['shoppingCart']['product1'] = array();
 
 // Initialize the 1st product values
 // Add the 1st product
 //$_SESSION['shoppingCart']['product1']['name'] = "";
 //$_SESSION['shoppingCart']['product1']['img'] = "product_images/cellphone-cellular-device-50684.jpg";
 //$_SESSION['shoppingCart']['product1']['description'] = "Full Screen Unlocked";
 /*
 if (!isset($products)) {
 $products = array(
 array(
 "numberOfProduct" => 1,
 "title" => "Smartphone",
 "image" => "product_images/cellphone-cellular-device-50684.jpg",
 "price" => 500,
 "description" => "Full Screen Unlocked Smartphone|5.7 Android Dual SIM Cell Phones, 512 RAM/512 ROM, GSM 2G",
 "stock" => 10
 ),
 array(
 "numberOfProduct" => 2,
 "title" => "Watch",
 "image" => "product_images/blur-brass-bronze-2113994.jpg",
 "price" => 100,
 "description" => "Original Mens Watch Analog Watch Dial, Pro Sport Diver with Screw Down Crown and Water Resistant to 200M",
 "stock" => 30
 ),
 array(
 "numberOfProduct" => 3,
 "title" => "Binoculars",
 "image" => "product_images/binoculars-black-equipment-55804.jpg",
 "price" => 150,
 "description" => "Black|25x magnifucation porro prism binocular|50mm objective lens|ultra sharp focus across the field of view| suitable for astronomical viewing|protective rubber covering",
 "stock" => 20
 )
 );
 }
 */
 /*
 if (!isset($_SESSION['products'][0])) {
  $_SESSION['products'][] = $products;
 }*/
 
 echo "<br><h1>3</h1>";
 var_dump($_SESSION);
 echo "<br>";
 echo "<br>";
 echo "<br>";
 
 
 
 
 
 
 
 foreach ($_SESSION['shoppingCart'] as $product) {
	echo '<section><h2>'.$product["title"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["description"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><p><span>Added to Cart: </span>'.$product["addedToCart"].
	'</p><form method="post" action="view_cart.php"><input type="hidden" name="title" value="'.$product["title"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="description" value="'.$product["description"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="number" value="'.$product["numberOfProduct"].
	'"><input type="hidden" name="addedToCart" value="'.$product["addedToCart"].'"><input type="submit" name="removeFromShoppingCart" value="Remove from Shopping Cart"></form></div></article></section>';
 };
 
 
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['number'])) {
		/*addProductToSession();
	}
	function addProductToSession(){*/
		$_SESSION['productNumber'] = $_POST['number'];
		$_SESSION['image'] = $_POST['image'];
		$_SESSION['title'] = $_POST['title'];
		$_SESSION['price'] = $_POST['price'];
		$_SESSION['description'] = $_POST['description'];
		$_SESSION['stock'] = $_POST['stock'];
		$_SESSION['addedToCart'] = $_POST['addedToCart'];
	}
	
	$productNumber = (int)$_SESSION['productNumber'];
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['removeFromShoppingCart'])) {
		/*$product = array();
		$product[] = $_SESSION['productNumber'];
		$product[] = $_SESSION['image'];
		$cars = array("BMW", "Mercedez");*/
		$_SESSION['products'][0][$productNumber]['stock'] += 1 ;
		$_SESSION['products'][0][$productNumber]['addedToCart'] -= 1 ;
		if ($_SESSION['products'][0][$productNumber]['addedToCart'] == 0) {
		unset($_SESSION['shoppingCart'][$productNumber - 1]['stock']);
		} else {
			$_SESSION['shoppingCart'][$productNumber - 1]['stock'] += 1;
		$_SESSION['shoppingCart'][$productNumber - 1]['addedToCart'] -= 1;
		}
		
		//$_SESSION['stock'] -= 1;
	}
	
	
 
 echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "productNumber";
	var_dump((int)$_SESSION["productNumber"]);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	//echo $_SESSION["productNumber"];
	var_dump($_POST);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['products'][0][$productNumber - 1]);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['products'][0][$productNumber - 1]['stock']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['products'][0]);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['shoppingCart']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION["description"]);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($quantity);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($product);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($productNumber);
 
 ?>
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>