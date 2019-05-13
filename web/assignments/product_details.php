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
 
 
 

  $product = array();
  
 /*
 echo "<br>";
 echo "<br>";
 echo "<br>";
 */
 /*
 $product["title"] = $_POST["title"];
 $product["image"] = $_POST["image"];
 $product["price"] = $_POST["price"];
 $product["description"] = $_POST["description"];
 $product["stock"] = $_POST["stock"];
 */
 
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['number'])) {
	
		$_SESSION['productNumber'] = $_POST['number'];
		$_SESSION['image'] = $_POST['image'];
		$_SESSION['title'] = $_POST['title'];
		$_SESSION['price'] = $_POST['price'];
		$_SESSION['description'] = $_POST['description'];
		$_SESSION['stock'] = $_POST['stock'];
		$_SESSION['addedToCart'] = $_POST['addedToCart'];
	}
 
 $productNumber = (int)$_SESSION['productNumber'];
 
 

	
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addToShoppingCart'])) {
		
		/*
		$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
		$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
		
		
		$quantity = count($_SESSION['shoppingCart']);
		$i = $quantity - 1;
		*/
		
		
		if(isset($_SESSION['shoppingCart'])) {
			$numberOfProducts = count($_SESSION['shoppingCart']);
	
			for($i = 0; $i < $numberOfProducts; $i++) {
				 foreach ($_SESSION['shoppingCart'][$i] as $productItem){
					if ($_SESSION['shoppingCart'][$i]['numberOfProduct'] == $_SESSION['productNumber']) {
						
						$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
						$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
						$_SESSION['shoppingCart'][$i]['stock'] -= 1;
						$_SESSION['shoppingCart'][$i]['addedToCart'] += 1;
						
						$addProduct = false;
						
					}
				}
				if($addProduct) {
					$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
				}
			}
		} else {
			$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
		}
		
		
		/*
		if(isset($_SESSION['shoppingCart'])) {
			$y = 0;
			//$numberOfProductItems = count($_SESSION['shoppingCart'][0]);
			/*
			foreach $_SESSION['shoppingCart'] as $product {
				for($i = 0; $i < $numberOfProductItems; $i++) {
					if ($_SESSION['shoppingCart'][$i]['numberOfProduct'] == $_SESSION['productNumber']) {
						$_SESSION['products'][0][$productNumber - 1]['stock'] -= 1;
						$_SESSION['products'][0][$productNumber - 1]['addedToCart'] += 1;
						$_SESSION['shoppingCart'][$i]['stock'] -= 1;
						$_SESSION['shoppingCart'][$i]['addedToCart'] += 1;
						$addProduct = FALSE;
						
					}
				}
				if($addProduct) {
					$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
				}
			}
		} else {
			$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
		}*/
		
		if ($_SESSION['products'][0][$productNumber - 1]['addedToCart'] == 1) {
		$_SESSION['shoppingCart'][] = $_SESSION['products'][0][$productNumber - 1];
	} else {
		$_SESSION['shoppingCart'][$i]['stock'] -= 1;
		$_SESSION['shoppingCart'][$i]['addedToCart'] += 1;
	} 
		

		$_SESSION['stock'] -= 1;
		$_SESSION['addedToCart'] += 1;
		
	}
	/*
	echo "<section><h2>".$_SESSION['title']."</h2><article><div><img src=".$_SESSION['image']."></div><div><p class='price'><span>Price: </span>".
	$_SESSION['price']."</p><p><span>Description: </span>".$_SESSION['description']."</p><p><span>Stock: </span>".$_SESSION['stock'].
	"</p><form action='product_details.php' method='post'><input type='submit' name='addToShoppingCart' value='Add to Shopping Cart'></form></div></article></section>";
	*/
	
	echo "<section><h2>".$_SESSION['title']."</h2><article><div><img src=".$_SESSION['image']."></div><div><p class='price'><span>Price: </span>".
	$_SESSION['price']."</p><p><span>Description: </span>".$_SESSION['description']."</p><p><span>Stock: </span>".$_SESSION['stock'].
	"</p><input type='hidden' name='productNumber' value='".$_SESSION['productNumber']."'><form action='product_details.php' method='post'><input type='submit' name='addToShoppingCart' value='Add to Shopping Cart'></form></div></article></section>";
	
// echo 
	
	
	/*
	function addToShoppingCart(){
		global $product;
		global $productNumber;
		$product[0] = $productNumber;
		$product[1] = $_SESSION['image'];
		$cars = array("BMW", "Mercedez");
		$_SESSION['shoppingCart'][] = $cars;
	}*/
	
	
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