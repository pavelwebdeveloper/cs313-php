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
  <title>View Cart Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
  <link href="css/normalize.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 
 <div class="clearfix">
  <div class="floatcolumn departmentsmenu">
    <ul>
      <li>The Flight</li>
      <li>The City</li>
      <li>The Island</li>
      <li>The Food</li>
    </ul>
  </div>

  <div class="floatcolumn content">
    <h1>The City</h1>
    <p>Chania is the capital of the Chania region on the island of Crete. The city can be divided in two parts, the old town and the modern city.</p>
    <p>You will learn more about web layout and responsive web pages in a later chapter.</p>
  </div>
</div>
 
 
 
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>