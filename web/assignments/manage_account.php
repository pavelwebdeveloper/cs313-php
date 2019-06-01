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
<html lang="en-us" id="logInRegister">
 <head>
  <title>Home Page</title>
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
 
 <div>
 <?php
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
   ?>
 <?php 
   echo '<p>You are logged in as' . $_SESSION['userData']['username'] . '<p>';
          
   echo  '<p>Your email: '.$_SESSION['userData']['email'].'<p>'
           ."<a class='adminlink' href='update_account.php?id=".urlencode($_SESSION['userData']['id'])."'>Update account information</a>";
   if($_SESSION['clientData']['clientLevel'] > 1) {echo "<h2>Administrative actions</h2><p>Use the link below to manage products.</p><a class='adminlink' href='/acme/products/index.php'>Products</a>";}
   
   ?> 
 </main>
 <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>