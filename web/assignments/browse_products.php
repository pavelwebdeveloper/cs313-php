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
 // Get the database connection file
 require_once '../library/connections.php';
 ?>
 <h1>This is Browse Products Page</h1>
 
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
 
 
 if(isset($_POST['searchProduct'])) {

$product = filter_input(INPUT_POST, 'searchProduct', FILTER_SANITIZE_STRING);

$stmt = $db->prepare('SELECT * FROM product WHERE product=:product');
$stmt->bindValue(':product', $product, PDO::PARAM_STR);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($products)) {
foreach ($products as $product)
{
  echo '<section><h2>'.$product["product"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["productdescription"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="product" value="'.$product["product"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="productdescription" value="'.$product["productdescription"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="id" value="'.$product["id"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article></section>';
}
}

} else {
 
 if (!isset($products)) {
	 
	 
 $products = $db->query('SELECT * FROM product');
 }
 
 //var_dump($products);
 
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
 /*
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['number'])) {
	
		$_SESSION['productNumber'] = $_POST['number'];
	}
 
 $productNumber = (int)$_SESSION['productNumber'];
 
 
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addToShoppingCart'])) {
		
		/*
		$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
		$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
		
		
		$quantity = count($_SESSION['shoppingCart']);
		$i = $quantity - 1;
		*/
		/*
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
						//$_SESSION['stock'] -= 1;
						//$_SESSION['addedToCart'] += 1;
						
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
						//$_SESSION['stock'] -= 1;
						//$_SESSION['addedToCart'] += 1;
				}
		} else {
			$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
			
			$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
			$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
			$_SESSION['shoppingCart'][0]['stock'] -= 1;
			$_SESSION['shoppingCart'][0]['addedToCart'] += 1;
			//$_SESSION['stock'] -= 1;
			//$_SESSION['addedToCart'] += 1;
			
		}
 }
 */
 /*
 $i = 0;
 foreach ($_SESSION['products'][$i] as $product) {
	echo '<section><h2>'.$product["title"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["description"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="title" value="'.$product["title"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="description" value="'.$product["description"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="number" value="'.$product["numberOfProduct"].
	'"><input type="hidden" name="addedToCart" value="'.$product["addedToCart"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article><form action="browse_products.php" method="post"><input type="hidden" name="number" value="'.$product["numberOfProduct"].
	'"><input type="submit" name="addToShoppingCart" value="Add to Shopping Cart"></form></section>';
	//echo '';
 $i++;
 };
 */
 $i = 0;
 foreach ($_SESSION['products'][$i] as $product) {
	echo '<section><h2>'.$product["product"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["productdescription"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="product" value="'.$product["product"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="productdescription" value="'.$product["productdescription"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="id" value="'.$product["id"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article></section>';
	//var_dump($_SESSION['products'][$i]);
 $i++;
 };
 
 /*
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
	var_dump($_SESSION['products'][0][$productNumber - 1]['stock']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	var_dump($_SESSION['products'][0][0]);
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
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($numberOfProducts);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "POST value";
	var_dump($_POST);
	*/
 
}
 
 ?>
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>