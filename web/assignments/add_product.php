<?php
// Start the session
session_start();
if(!($_SESSION['loggedin'])){header('Location: home.php');}
if(!$_SESSION['userData']['userlevel'] > 1) {header('Location: manage_account.php');}
// Create an array for the shopping cart in the session
if (!isset($_SESSION['shoppingCart'])) {
 $_SESSION['shoppingCart'] = array();
 $_SESSION['products'] = array();
 }
?>
<!DOCTYPE html>
<html lang="en-us" id="logInRegister">
 <head>
  <title>Add Product Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
  <link href="css/normalize.css" rel="stylesheet" media="screen">
 </head>
 <body>
 
 <main>
 
 <?php
 // Get the database connection file
 require_once '../library/connections.php';
 // Query the product groups data
   $getProductGroups = $db->prepare('SELECT * FROM productgroup');
$getProductGroups->execute();
$productGroups = $getProductGroups->fetchAll(PDO::FETCH_ASSOC);
 // Build a dynamic drop-down select list using the $productGroups array
 $productGroupsList .= '<select name="productGroupId" id="productGroupId">';
 $productGroupsList .= '<option disabled selected>Choose a product group</option>';
 foreach ($productGroups as $productGroup) {
 /*$catList .= "<option value=".urlencode($category['categoryId']).">".urlencode($category['categoryName'])."</option>";*/
  $productGroupsList .= "<option value='$productGroup[id]'";
  if(isset($productGroupId)) {
   
   if($productGroup['id'] === $productGroupId){
    $productGroupsList .= ' selected ';
   }
  }
  
  $productGroupsList .= ">$productGroup[productgroupname]</option>";
 }
 $productGroupsList .= '</select>';
 ?>
 
 
 <?php
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
   ?>
   
   <form action="add_product.php" method="post">
    <fieldset>
	<legend>Add product</legend>
     <label for="productGroupName">Choose Product Group Name</label><br>
     <?php
	echo $productGroupsList;
 ?><br><br>
 <label for="productName">Product Name</label><br>
     <input type="text" name="productName" id="productName" pattern="[A-Za-z]{3,}" required><br><br>
	 <label for="productDescription">Product Description:</label>
<textarea name="productDescription" id="productDescription" rows="10" cols="100"></textarea><br>
<label for="imageFilePath">Image File Path for the New Product</label><br>
     <input type="text" name="imageFilePath" id="imageFilePath" pattern="[A-Za-z/_.]{3,}" value="/images/product_images/" required><br><br>
	 <label for="productPrice">Product Price</label>
	 <input type="number" name="productPrice" id="productPrice">
	 <label for="productStock">Product Stock</label>
	 <input type="number" name="productStock" id="productStock">
	 <input class="submitBtn" type="submit" value="Add product">
     <!-- Add the action name - value pair -->
	 <input type="hidden" name="productDepartmentId" value="$_POST['departmentId']">
     <input type="hidden" name="AddProduct" value="addProduct">
    </fieldset>
   </form>
   
   
   <?php

if(isset($_POST['AddProduct'])) {
	// Filter and store the data
	$productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
	$productGroupId = filter_input(INPUT_POST, 'productGroupId', FILTER_SANITIZE_NUMBER_INT);	
	$departmentId = filter_input(INPUT_POST, 'departmentId', FILTER_SANITIZE_NUMBER_INT);	
	
	$imageFilePath = filter_input(INPUT_POST, 'imageFilePath', FILTER_SANITIZE_STRING);	
	$productDescription = filter_input(INPUT_POST, 'productDescription', FILTER_SANITIZE_STRING);
$productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_NUMBER_FLOAT);
$productStock = filter_input(INPUT_POST, 'productStock', FILTER_SANITIZE_NUMBER_INT);	

// Check for missing data
   if(empty($productName) || empty($productGroupId) || empty($imageFilePath) || empty($productDescription) || empty($productPrice) || empty($productStock)){
    $_SESSION['message'] = '<p class="message">Please, specify the information for all fields.</p>';
    header('location: add_product.php');
    exit;
   }  
   
   $stmt = $db->prepare('INSERT INTO product (product, productgroupId, productdepartmentId, productDescription, image, price, stock) VALUES (:productGroupName, :departmentId, :imageFilePath)'); 
 $stmt->bindValue(':productName', $productName, PDO::PARAM_STR);
 $stmt->bindValue(':productgroupId', $productgroupId, PDO::PARAM_INT);
 $stmt->bindValue(':productdepartmentId', $productdepartmentId, PDO::PARAM_INT);
 $stmt->bindValue(':productDescription', $productDescription, PDO::PARAM_STR);
 $stmt->bindValue(':imageFilePath', $imageFilePath, PDO::PARAM_STR);
 $stmt->bindValue(':productPrice', $productPrice, PDO::PARAM_INT);
 $stmt->bindValue(':productStock', $productStock, PDO::PARAM_INT);
$stmt->execute();
/*
var_dump($stmt);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Hi";
*/
   
   // Send the data to the model
   $addProductOutcome = $stmt->rowCount();
   
   // Check and report the result
   if($addProductOutcome === 1){
	   $_SESSION['message'] = "<p class='messagesuccess'>The new product " . $productName . " has successfully been added.</p>";
   header('location: add_product.php');
   exit;
   } else {
    $_SESSION['message'] = "<p class='messagefailure'>Sorry, adding the new product " . $productName . " has failed. Please, try again.</p>";
            header('location: add_product.php.php');
    exit;
   }
	
	
}

   ?>
   
   <?php
   
 $getProducts = $db->prepare('SELECT id, product, image FROM product ORDER BY product ASC'); 
$getProducts->execute();
$products = $getProducts->fetchAll(PDO::FETCH_ASSOC);
$prodList = '<table>';
    $prodList .= '<thead>';
    $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
    $prodList .= '</thead>';
    $prodList .= '<tbody>';
    foreach ($products as $product) {
     $prodList .= "<tr><td>$product[product]</td>";
     $prodList .= "<td><a class='tablelink' href='modify_product.php?id=$product[id]' title='Click to modify'>Modify</a></td>";
     $prodList .= "<td><a class='tablelink' href='manage_products.php?action=del&id=$product[id]' title='Click to delete'>Delete</a></td>";
    }
    $prodList .= '</tbody></table>';
	
 ?>
 
 </main>
 <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>