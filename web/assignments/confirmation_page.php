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
  <title>Confirmation Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 <h1>This is Confirmation Page</h1>
 <?php




if (empty($_SESSION['shoppingCart'])) {
	 echo "<h1>The Shopping Cart is empty</h1>";
 } else {
	 echo "<h1>These are the products that you have purchased</h1><br><br>";

foreach ($_SESSION['shoppingCart'] as $product) {
	echo '<section><h2>'.$product["title"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["description"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><p><span>Added to Cart: </span>'.$product["addedToCart"].'</p></div></article></section>';
 };
 
 echo "<h1>The products that you have purchased will be shipped to the following address</h1><br><br>";
echo "Country: ".$country."<br>";
echo "City: ".$city."<br>";
echo "Street: ".$street."<br>";
echo "House number: ".$houseNumber."<br>";
echo "Zip code: ".$zipCode."<br>";

 }

//echo "Hello";

//var_dump($_POST);
// define variables and set to empty values
$country = $city = $street = $houseNumber = $zipCoce = "";



//var_dump($major);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$country = htmlspecialchars($_POST["country"]);
	// Check if name contains only letters and whitespace
	$city = htmlspecialchars($_POST["city"]);
	$street = htmlspecialchars($_POST["street"]);
	$houseNumber = htmlspecialchars($_POST["houseNumber"]);
	$zipCode = htmlspecialchars($_POST["zipCode"]);

	
}

?>
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>