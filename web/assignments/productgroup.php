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
<html lang="en-us" id="products">
 <head>
  <title>Product Group Page</title>
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
  <?php  
 echo '<ul>';
 echo '<li>Departments</li>';
 foreach ($db->query('SELECT * FROM productdepartment') as $row)
{	
 echo '<li><a href="productgroups.php?id=' . $row['id'] . '">' . $row['productdepartmentname'] . '</a></li>';
}
echo '</ul>';

 
 ?>
  </div>
   <div id="flexlayoutright">
   <?php
   $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 
 
 
 $stmt = $db->prepare('SELECT * FROM product WHERE productgroupId = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$group = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($group)) {
	foreach ($group as $singleproduct) {
  echo '<section><h2>'.$singleproduct["product"].'</h2><article><div><img src='.$singleproduct["image"].'></div><div><p class="price"><span>Price: </span>'.$singleproduct["price"].
	'</p><p><span>Description: </span>'.$singleproduct["productdescription"].'</p><p><span>Stock: </span>'.$singleproduct["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="product" value="'.$singleproduct["product"].
	'"><input type="hidden" name="image" value="'.$singleproduct["image"].'"><input type="hidden" name="price" value="'.$singleproduct["price"].
	'"><input type="hidden" name="productdescription" value="'.$singleproduct["productdescription"].'"><input type="hidden" name="stock" value="'.$singleproduct["stock"].
	'"><input type="hidden" name="id" value="'.$singleproduct["id"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article></section>';
	}
}
   
   
   
   
   //$i = 1;
   /*
   foreach ($db->query('SELECT * FROM product') as $product)
{	
echo '<section><h2>'.$product["product"].'</h2><article><div><img src='.$product["image"].'></div><div><p class="price"><span>Price: </span>'.$product["price"].
	'</p><p><span>Description: </span>'.$product["productdescription"].'</p><p><span>Stock: </span>'.$product["stock"].
	'</p><form method="post" action="product_details.php"><input type="hidden" name="id" value="'.$product["id"].
	'"><input type="submit" name="productDetails" value="Product details"></form></div></article></section>';
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
 
 //var_dump($groups);
?>
  </div>
  </div>
 
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>