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
 <form method="post" action="signUp_page.php">
<label for="userName">Full name:</label><br>
<input type="text" id="userName" name="userName" pattern="[A-Za-z ]{2,}" required><br>
<label for="userEmail">E-mail:</label><br>
<input type="email" id="userEmail" name="userEmail" placeholder="someone@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.]+\.[a-z]{2,}$" required><br>
<label for="userPassword">Password:</label><br>
<input type="password" name="userPassword" id="userPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>
<input type="submit" value="Sign Up">
<input type="hidden" value="signUp">
</form>
 </div>
 
 <?php
 var_dump($_POST);
  echo "<br>";
if(isset($_POST['signUp'])) {
	// Filter and store the data
   $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
   $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
   $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
    // Check for missing data
   if(empty($userName) || empty($userEmail) || empty($userPassword)){
    $message = '<p>Please, provide information correctly for all form fields.</p>';
	header("Location: signUp_page.php");
    exit;
   }
   
    var_dump($userName);
	 echo "<br>";
	  echo "<br>";
	  var_dump($userName);
	  echo "<br>";
	  echo "<br>";
	  var_dump($userName);
	  echo "<br>";
	  echo "<br>";
	
   
   // Hash the checked password
   $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
   
   
   $stmt = $db->prepare('INSERT INTO storeuser (username, email, password) VALUES (:username, :useremail, :userpassword)'); 
$stmt->bindValue(':username', $userName, PDO::PARAM_STR);
$stmt->bindValue(':useremail', $userEmail, PDO::PARAM_STR);
 $stmt->bindValue(':userpassword', $hashedPassword, PDO::PARAM_STR);
$stmt->execute();
$signUpOutcome = $stmt->rowCount();
   
   // Check and report the result and create the cookie when the individual registers with the site
   if($signUpOutcome === 1){
    $_SESSION['message'] = "<p>Thanks for registering. Please, use your email and password to login.</p>";
    header("Location: logIn_page.php");
   exit;
   } else {
    $message = "<p>Sorry, but the registration failed. Please, try again.</p>";
	header("Location: signUp_page.php");
    exit;
   }
   
}
 ?>
 
 </main>
 </body>
</html>