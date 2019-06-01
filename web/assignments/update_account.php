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
 <form method="post" action="update_account.php">
<label for="userName">Full name:</label><br>
<input type="text" id="userName" name="userName" pattern="[A-Za-z ]{2,}" <?php if(isset($_SESSION['userData']['username'])) {echo "value='$_SESSION['userData']['username']'"; } ?> required><br>
<label for="userEmail">E-mail:</label><br>
<input type="email" id="userEmail" name="userEmail" placeholder="someone@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.]+\.[a-z]{2,}$" <?php if(isset($_SESSION['userData']['email'])) {echo "value='$_SESSION['userData']['email']'"; } ?> required><br>
<input type="submit" value="Update Account">
<input type="hidden" name="updateAccount" value="updateAccount">
</form>
<h2>Change Password</h2>
   <p>You can use this form to update your password. Entering and submitting a new password in this field you will change the current password.</p>
<form method="post" action="update_account.php">
<label for="userPassword">Password:</label><br>
<input type="password" name="userPassword" id="userPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>
<input type="submit" value="Change Password">
<input type="hidden" name="updatePassword" value="updatePassword">
</form>
 </div>
 
 <?php
 var_dump($_POST);
  echo "<br>";
if(isset($_POST['updateAccount'])) {
	// Filter and store the data
   $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
   $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
   
    // Check if the email address is different than the one in the session
   if($clientEmail != $_SESSION['clientData']['clientEmail']) {
     //  checking for an existing email address
   $alreadyexistingEmail = $db->prepare('SELECT email FROM storeuser WHERE email=:userEmail');
$alreadyexistingEmail->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
$alreadyexistingEmail->execute();
$findEmail = $alreadyexistingEmail->fetch(PDO::FETCH_ASSOC);
   }
// Ask if the array is empty or not
 if(empty($findEmail)) {
  $findEmail = 0;  
 } else {
  $findEmail = 1;
 }
   // Check for existing email address in the table
   if($findEmail) {
    $_SESSION['message'] = "<p>Sorry. Such an email address already exists.</p>";
    header("Location: update_account.php");
   exit;
   }
   }
   
    var_dump($userName);
	 echo "<br>";
	  echo "<br>";
	  var_dump($userEmail);
	  echo "<br>";
	  echo "<br>";
	  var_dump($userPassword);
	  echo "<br>";
	  echo "<br>";
	
   
   // Hash the checked password
   $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
   var_dump($hashedPassword);
	  echo "<br>";
	  echo "<br>";
   
   
   $stmt = $db->prepare('INSERT INTO storeuser (username, email, password, userlevel) VALUES (:username, :useremail, :userpassword, 1)'); 
 $stmt->bindValue(':username', $userName, PDO::PARAM_STR);
$stmt->bindValue(':useremail', $userEmail, PDO::PARAM_STR);
 $stmt->bindValue(':userpassword', $hashedPassword, PDO::PARAM_STR);
$stmt->execute();
var_dump($stmt);
	  echo "<br>";
	  echo "<br>";
$signUpOutcome = $stmt->rowCount();
var_dump($signUpOutcome);
	  echo "<br>";
	  echo "<br>";
   
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