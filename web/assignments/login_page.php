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
 <form method="post" action="login_page.php">
<label for="userEmail">E-mail:</label><br>
<input type="email" id="userEmail" name="userEmail" placeholder="someone@gmail.com" pattern="[a-z0-9\._%+-]+@[a-z0-9.]+\.[a-z]{2,}$" <?php if(isset($userEmail)){echo "value='$userEmail'";} ?> required><br>
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
 
if(isset($_POST['LogIn'])) {
	// Filter and store the data
   $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
   $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);

   
   
   // Check for missing data
   if(empty($userEmail) || empty($userPassword)){
    $_SESSION['message'] = "<p class='messagefailure'>Please, provide a valid email address and password.</p>";
	header("Location: login_page.php");
    exit;
   }
   
   // Query the client data based on the email address
   $getUserData = $db->prepare('SELECT id, username, email, password, userlevel FROM storeuser WHERE email=:userEmail');
$getUserData->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
$getUserData->execute();
$userData = $getUserData->fetch(PDO::FETCH_ASSOC);

	  
   
   // Compare the password just submitted against
   // the hashed password for the matching client
   $hashCheck = password_verify($userPassword, $userData['password']);
   
	  
   // If the hashes don't match create an error
   // and return to the login view
   if(!$hashCheck) {
    $_SESSION['message'] = "<p class='messagefailure'>Please, check your password and try again.</p>";
    header("Location: login_page.php");
    exit;
   }
    // A valid user exists, log them in
   $_SESSION['loggedin'] = TRUE;
   // Remove the password from the array
   // the array_pop function removes the last
   // element from an array
   
   var_dump($userData);
   array_pop($userData);
   // Store the array into the session
   $_SESSION['userData'] = $userData;
   $_SESSION['message'] = '';
   // Send them to the admin view
   header("Location: home.php");
   exit;
   
}

 ?>
 
 
 
 </main>
 <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>