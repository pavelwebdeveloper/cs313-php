<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>Product Details Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 <?php
 var_dump($_SESSION);
 
 // Create an array for the shopping cart in the session
 $_SESSION['shoppingCart'] = array();
 
 echo "<br>";
 
 var_dump($_SESSION);
 
 echo "<br>";
 
 var_dump($_POST);
 
 // Add the 1st product
 //$_SESSION['shoppingCart']['product1'] = array();
 
 // Initialize the 1st product values
 // Add the 1st product
 //$_SESSION['shoppingCart']['product1']['name'] = "";
 //$_SESSION['shoppingCart']['product1']['img'] = "product_images/cellphone-cellular-device-50684.jpg";
 //$_SESSION['shoppingCart']['product1']['description'] = "Full Screen Unlocked";
 
 /*
 $products = array(
 array(
 "title" => "Smartphone",
 "image" => "product_images/cellphone-cellular-device-50684.jpg",
 "price" => 500,
 "description" => "Full Screen Unlocked Smartphone|5.7 Android Dual SIM Cell Phones, 512 RAM/512 ROM, GSM 2G",
 "stock" => 10
 ),
 array(
 "title" => "Watch",
 "image" => "product_images/blur-brass-bronze-2113994.jpg",
 "price" => 100,
 "description" => "Original Mens Watch Analog Watch Dial, Pro Sport Diver with Screw Down Crown and Water Resistant to 200M",
 "stock" => 30
 ),
 array(
 "title" => "Binoculars",
 "image" => "product_images/binoculars-black-equipment-55804.jpg",
 "price" => 150,
 "description" => "Black|25x magnifucation porro prism binocular|50mm objective lens|ultra sharp focus across the field of view| suitable for astronomical viewing|protective rubber covering",
 "stock" => 20
 )
 );
 */

  $product = array();
 
 echo "<br>";
 
 
 $product["title"] = $_POST["title"];
 $product["image"] = $_POST["image"];
 $product["price"] = $_POST["price"];
 $product["description"] = $_POST["description"];
 $product["stock"] = $_POST["stock"];
 
 $productDetails = new ArrayObject($product);
 
 var_dump($product);
 
 echo "<br>";
 
 var_dump($productDetails);
 
 $productDetail = clone $productDetails;
 
 var_dump($productDetail);
 
	echo "<section><h2>".$productDetail["title"]."</h2><article><div><img src=".$productDetail["image"]."></div><div><p class='price'><span>Price: </span>".
	$productDetail["price"]."</p><p><span>Description: </span>".$productDetail["description"]."</p><p><span>Stock: </span>".$productDetail["stock"].
	"</p><form action='product_details.php' method='post'><input type='submit' name='addToShoppingCart' value='Add to Shopping Cart'></form></div></article></section>";
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addToShoppingCart'])) {
		addToShoppingCart();
	}
	function addToShoppingCart(){
		$_SESSION['shoppingCart'][] = $productDetail;
	}
	
	
 
 ?>
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>