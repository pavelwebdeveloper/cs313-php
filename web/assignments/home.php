<?php
// Start the session
session_start();
// Create an array for the shopping cart in the session
if (!isset($_SESSION['shoppingCart'])) {
 $_SESSION['shoppingCart'] = array();
 $_SESSION['products'] = array();
 }
 
 // Get the database connection file
 require_once '../library/connections.php';
?>
<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>Home Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 
<div class="homepage">
 <div> 
 </div>
 <div id="right">
 </div>
 </div>
 
 <div class="bottomNavigationLinks">
 <div>
 <form method="post" action="browse_products.php">
<input class="navigationButton" type="submit" value="Return to the Browse Products Page">
</form>
</div>
<div>
 <form method="post" action="check_out.php">
<input class="navigationButton" type="submit" value="Continue to the Checkout Page">
</form>
</div>
</div>

 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>