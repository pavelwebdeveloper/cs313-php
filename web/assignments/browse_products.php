<?php
// Start the session
session_start();
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
 var_dump($_SESSION);
 
 // Create an array for the shopping cart in the session
 $_SESSION['shoppingCart'] = array();
 
 echo "<br>";
 
 var_dump($_SESSION);
 
 // Add the 1st product
 //$_SESSION['shoppingCart']['product1'] = array();
 
 // Initialize the 1st product values
 // Add the 1st product
 //$_SESSION['shoppingCart']['product1']['name'] = "";
 //$_SESSION['shoppingCart']['product1']['img'] = "product_images/cellphone-cellular-device-50684.jpg";
 //$_SESSION['shoppingCart']['product1']['description'] = "Full Screen Unlocked";
 
 
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
 
 foreach ($products as $product) {
	echo "<section><h2>".$product["title"]."</h2><article><div><img src=".$product["image"]."></div><div><p class='price'><span>Price: </span>".$product["price"].
	"</p><p><span>Description: </span>".$product["description"]."</p><p><span>Stock: </span>".$product["stock"]."</p><form method='post' action='product_details.php'><input type='hidden' name='productDetails' value='".$product."'><input type='submit' name='productdetails' value='Product details' id='product_details.php'></form></div></article></section>";
	/*$detailedproduct = array();
	$detailedproduct = $product["title"];
	$detailedproduct = $product["image"];
	$detailedproduct = $product["price"];
	$detailedproduct = $product["description"];*/
 };
 
 ?>
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>