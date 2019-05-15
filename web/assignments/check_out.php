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
<label class="label" for="country">Country: <input type="text" name="country"></label><br>
<label class="label" for="city">City: <input type="text" name="city"></label><br>
<label class="label" for="street">Street: <input type="text" name="street"></label><br>
<label class="label" for="houseNumber">House number: <input type="text" name="houseNumber"></label><br>
<label class="label" for="zipCode">Zipcode: <input type="text" name="zipCode"></label><br>

<input type="submit" value="Complete the purchase">

</form>
<form method="post" action="view_cart.php">
<input type="submit" value="Return to the cart">
</form>
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>