<?php
// Start the session
session_start();
// Create an array for the shopping cart in the session
// Get the value from the action name - value pair
 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 
 switch ($action){
	 case 'Logout':
   $_SESSION = [];
   session_destroy();
   header("Location: home.php");
   break;
  default:
	 }
 
if (!isset($_SESSION['shoppingCart'])) {
 $_SESSION['shoppingCart'] = array();
 $_SESSION['products'] = array();
 }
?>
<!DOCTYPE html>
<html lang="en-us" id="products">
 <head>
  <title>Home Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
  <link href="css/normalize.css" rel="stylesheet" media="screen">
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
 <div id="flexlayout">
  <div id="flexlayoutleft">
  <h2 id="departmentsMenuHeading">Departments</h2>
  <?php  
 echo '<ul>';
 foreach ($db->query('SELECT * FROM productdepartment') as $row)
{	
 echo '<li><a href="productgroups.php?id=' . $row['id'] . '">' . $row['productdepartmentname'] . '</a></li>';
}
echo '</ul>';

 
 ?>
  </div>
   <div id="flexlayoutright">
   <h2>These are some of the products that we sell</h2>
   <?php
   //$i = 1;
   
   $displayProductForHomePage = 21;
   for($displayProductForHomePage; $displayProductForHomePage < 30; $displayProductForHomePage++) {
   foreach ($db->query('SELECT * FROM product WHERE productgroupid = ' . $displayProductForHomePage . ';') as $product)
{	
echo '<section><h2>'.$product["product"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["productdescription"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="product" value="'.$product["product"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="productdescription" value="'.$product["productdescription"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="id" value="'.$product["id"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article></section>';
	break;
}
   }
   
   /*
   $i = 0;
 foreach ($_SESSION['products'][$i] as $product) {
	echo '<section><h2>'.$product[""].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["description"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="title" value="'.$product["title"].
	'"><input type="hidden" name="image" value="'.$product["image"].'"><input type="hidden" name="price" value="'.$product["price"].
	'"><input type="hidden" name="description" value="'.$product["description"].'"><input type="hidden" name="stock" value="'.$product["stock"].
	'"><input type="hidden" name="number" value="'.$product["numberOfProduct"].
	'"><input type="hidden" name="addedToCart" value="'.$product["addedToCart"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article></section>';
 $i++;
 };*/
 
 //var_dump($product);
?>
  </div>
  </div>
 
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>