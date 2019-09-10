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
 
 
 
 <h1>This is Checkout Page</h1>
 <p>Please, input the information about your address. It is required to fill out all the fields.</p>
 <form method="post" action="confirmation_page.php">
<label class="address" for="country">Country: <input type="text" name="country" <?php if(isset($_SESSION['customerCountry'])){echo "value='$_SESSION["customerCountry"]'";} else {echo "value=''";} ?> required></label><br>
<label class="address" for="city">City: <input type="text" name="city" <?php if(isset($_SESSION['customerCity'])){echo "value='$_SESSION['customerCity']'";} else {echo "value=''";} ?> required></label><br>
<label class="address" for="street">Street: <input type="text" name="street" <?php if(isset($_SESSION['customerStreet'])){echo "value='$_SESSION['customerStreet']'";} else {echo "value=''";} ?> required></label><br>
<label class="address" for="houseNumber">House number: <input type="text" name="houseNumber" <?php if(isset($_SESSION['customerHouseNumber'])){echo "value='$_SESSION['customerHouseNumber']'";} else {echo "value=''";} ?> required></label><br>
<label class="address" for="zipCode">Zipcode: <input type="text" name="zipCode" <?php if(isset($_SESSION['customerZipCode'])){echo "value='$_SESSION['customerZipCode']'";} else {echo "value=''";} ?> required></label><br>

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