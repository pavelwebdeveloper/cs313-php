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
  <title>Check Out Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 
 <form method="post" action="confirmation_page.php">
<label class="address" for="country">Country: <input type="text" name="country"></label><br>
<label class="address" for="city">City: <input type="text" name="city"></label><br>
<label class="address" for="street">Street: <input type="text" name="street"></label><br>
<label class="address" for="houseNumber">House number: <input type="text" name="houseNumber"></label><br>
<label class="address" for="zipCode">Zipcode: <input type="text" name="zipCode"></label><br>

<input class="submitBtn" type="submit" value="Complete the purchase">

</form>

<div class="bottomNavigationLinks">
 <div>
 <form method="post" action="view_cart.php">
<input class="navigationButton" type="submit" value="Return to the Shopping Cart">
</form>
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