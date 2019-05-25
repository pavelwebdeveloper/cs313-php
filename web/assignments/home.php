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
 <section>
 
 
 </section>
 <section id="right">
 </section>
 </div>

 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>