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
 <?php
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
   ?>
 <form method="post" action="logIn_page.php">
<label for="userEmail">E-mail:</label><br>
<input type="email" id="userEmail" name="userEmail" placeholder="someone@gmail.com" pattern="[a-z0-9\._%+-]+@[a-z0-9.]+\.[a-z]{2,}$" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required><br>
<label for="userPassword">Password:</label><br>
<input type="password" name="userPassword" id="userPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>
<input class="submitButton" type="submit" value="Log in">
<input type="hidden" name="LogIn" value="logIn">
<br>
<p id="login">Not registered yet?</p>
<button type="button"><a id="aregister" href="signUp_page.php" title="a link to a sign_up page">Sign Up</a></button>
</form>
 </div>
 
 <?php
 var_dump($_POST);
  echo "<br>";
	  echo "<br>";
if(isset($_POST['LogIn'])) {
	// Filter and store the data
   $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
   $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);

   var_dump($userEmail);
	  echo "<br>";
	  echo "<br>";
	  var_dump($userPassword);
	  echo "<br>";
	  echo "<br>";
   
   // Check for missing data
   if(empty($userEmail) || empty($userPassword)){
    $_SESSION['message'] = "<p>Please, provide a valid email address and password.</p>";
	header("Location: logIn_page.php");
    exit;
   }
   
   // Query the client data based on the email address
   $getUserData = $db->prepare('SELECT id, username, email, password FROM storeuser WHERE email=:userEmail');
$getUserData->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
$getUserData->execute();
$userData = $getUserData->fetch(PDO::FETCH_ASSOC);
var_dump($userData);
	  echo "<br>";
	  echo "<br>";
	  
   
   // Compare the password just submitted against
   // the hashed password for the matching client
   $hashCheck = password_verify($userPassword, $userData['userPassword']);
   var_dump($hashCheck);
	  echo "<br>";
	  echo "<br>";
	  /*
   // If the hashes don't match create an error
   // and return to the login view
   if(!$hashCheck) {
    $_SESSION['message'] = "<p>Please, check your password and try again.</p>";
    header("Location: logIn_page.php");
    exit;
   }
   
   */
}

 ?>
 
 
 
 </main>
 </body>
</html>