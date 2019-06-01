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
 
 <main>
 
 <?php
 // Get the database connection file
 require_once '../library/connections.php';
 ?>
 
 <div>
 <form method="post" action="home.php">
<label for="name">E-mail:</label><br>
<input type="email" id="email" name="email" placeholder="someone@gmail.com" pattern="[a-z0-9\._%+-]+@[a-z0-9.]+\.[a-z]{2,}$" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required><br>
<label for="name">Password:</label><br>
<input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
<input class="submitButton" type="submit" value="Log in">
<br>
<p id="login">Not registered yet?</p>
<button type="button"><a id="aregister" href="signUp_page.php" title="a link to a sign_up page">Sign Up</a></button>
</form>
 </div>
 
 
 
 </main>
 </body>
</html>