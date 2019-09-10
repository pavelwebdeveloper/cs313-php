<?php
// Start the session
session_start();
// Create an array for the shopping cart in the session
/*
if (!isset($_SESSION['shoppingCart'])) {
 $_SESSION['shoppingCart'] = array();
 $_SESSION['products'] = array();
 }
 */
?>
<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>Check Out Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 
 <?php 
 
		$_SESSION['customerCountry'] = '';
		$_SESSION['customerCity'] = '';
		$_SESSION['customerStreet'] = '';
		$_SESSION['customerHouseNumber'] = '';
		$_SESSION['customerZipCode'] = '';
 
 ?>
 
 <h1>This is Checkout Page</h1>
 <p>Please, input the information about your address. It is required to fill out all the fields.</p>
 <form method="post" action="confirmation_page.php">
<label class="address" for="country">Country: <input type="text" name="country" <?php if(empty($_SESSION['customerCountry'])){echo "value=''";} else {echo "value='$_SESSION['customerCountry']'";} ?> required></label><br>
<label class="address" for="city">City: <input type="text" name="city" <?php if(empty($_SESSION['customerCity'])){echo "value=''";} else {echo "value='$_SESSION['customerCity']'";} ?> required></label><br>
<label class="address" for="street">Street: <input type="text" name="street" <?php if(empty($_SESSION['customerStreet'])){echo "value=''";} else {echo "value='$_SESSION['customerStreet']'";} ?> required></label><br>
<label class="address" for="houseNumber">House number: <input type="text" name="houseNumber" <?php if(empty($_SESSION['customerHouseNumber'])){echo "value=''";} else {echo "value='$_SESSION['customerHouseNumber']'";} ?> required></label><br>
<label class="address" for="zipCode">Zipcode: <input type="text" name="zipCode" <?php if(empty($_SESSION['customerZipCode'])){echo "value=''";} else {echo "value='$_SESSION['customerZipCode']'";} ?> required></label><br>

<input class="submitBtn" type="submit" name="CompletePurchase" value="Complete the purchase">

</form>


<div class="bottomNavigationLinks">
 <div>
 <form method="post" action="view_cart.php">
<input class="navigationButton" type="submit" name="ReturnToShoppingCart" value="Return to the Shopping Cart">
</form>

<?php 
if(isset($_POST['ReturnToShoppingCart'])) {
 $_SESSION['customerCountry'] = $_POST['country'];
		$_SESSION['customerCity'] = $_POST['city'];
		$_SESSION['customerStreet'] = $_POST['street'];
		$_SESSION['customerHouseNumber'] = $_POST['houseNumber'];
		$_SESSION['customerZipCode'] = $_POST['zipCode'];
 
 ?>

</div>
</div>

<!--
<form method="post" action="view_cart.php">
<input type="submit" value="Return to the cart">
</form>
-->
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>