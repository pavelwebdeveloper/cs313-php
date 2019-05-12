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
 
 <form method="post" action="comfirmation_page.php">
<label for="name">Country:</label>
<input type="text" name="country"><br>
<label for="email">City:</label>
<input type="text" name="city"><br>
<label for="email">Street:</label>
<input type="text" name="street"><br>
<label for="email">House number:</label>
<input type="text" name="houseNumber"><br>
<label for="email">Zipcode:</label>
<input type="text" name="zipCode"><br>

<input type="submit" value="Complete the purchase">
<button type="button" value="Return to the cart">

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