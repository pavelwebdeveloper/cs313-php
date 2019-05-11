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
 echo "<br>";
 echo "<br>";
 echo "<br>";
 
 // Create an array for the shopping cart in the session
 $_SESSION['shoppingCart'] = array();
 
 echo "<br>";
 
 var_dump($_SESSION);
 echo "<br>";
 echo "<br>";
 
 echo "<br>";
 
 echo "POST";
 var_dump($_POST);
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
 echo "<br>";
 echo "<br>";
 
 
 $product["title"] = $_POST["title"];
 $product["image"] = $_POST["image"];
 $product["price"] = $_POST["price"];
 $product["description"] = $_POST["description"];
 $product["stock"] = $_POST["stock"];
 
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['number'])) {
		addProductToSession();
	}
	function addProductToSession(){
		$_SESSION['productNumber'] = $_POST['number'];
		$_SESSION['image'] = $_POST['image'];
		$_SESSION['title'] = $_POST['title'];
		$_SESSION['price'] = $_POST['price'];
		$_SESSION['description'] = $_POST['description'];
		$_SESSION['stock'] = $_POST['stock'];
	}
 
 $productNumber = (int)$_SESSION['productNumber'];
 
	echo "<section><h2>".$_SESSION['title']."</h2><article><div><img src=".$_SESSION['image']."></div><div><p class='price'><span>Price: </span>".
	$_SESSION['price']."</p><p><span>Description: </span>".$_SESSION['description']."</p><p><span>Stock: </span>".$_SESSION['stock'].
	"</p><form action='product_details.php' method='post'><input type='submit' name='addToShoppingCart' value='Add to Shopping Cart'></form></div></article></section>";
	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addToShoppingCart'])) {
		addToShoppingCart();
	}
	function addToShoppingCart(){
		$_SESSION['shoppingCart'][0][] = $_SESSION['products'][0][$productNumber - 1];
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
	echo $productNumber;
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['products'][0][$productNumber - 1]);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['products']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION['products']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($_SESSION["description"]);
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