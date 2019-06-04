<?php
// Get the database connection file
 require("../../library/dbConnection.php");
 $db = dbConnection();
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>SignUp</title>
 </head>
 <body>
 
 <main>
 
 
 <div>
 <?php
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
   ?>
   <?php
   if (isset($_SESSION['nomatchmessage'])) {
    echo $_SESSION['nomatchmessage'];
   }
   ?>
 <form method="post" action="sign-up_page.php">
<label for="userName">Name:</label><br>
<input type="text" id="userName" name="userName" pattern="[A-Za-z ]{3,}" required><br>
<label for="userPassword">Password:</label><br>
<span class="passworddescription">Passwords must be at least 7 characters and contain at least 1 number</span><br>
<input type="password" name="userPassword" id="userPassword" pattern="[A-Za-z\d]{7,}" required><?php if(isset($_SESSION['nomatchmessage'])) {
	echo '<span style="color:red">*</span>';
} ?><br><br>
<label for="duplicateUserPassword">Please, input the password one more time:</label><br>
<input type="password" name="duplicateUserPassword" id="duplicateUserPassword" pattern="[A-Za-z\d]{7,}" required><?php if(isset($_SESSION['nomatchmessage'])) {
	echo '<span style="color:red">*</span>';
} ?><br><br>
<input type="submit" value="Sign Up">
<input type="hidden" name="SignUp" value="signUp">
</form>
 </div>
 
 <?php
if(isset($_POST['SignUp'])) {
	// Filter and store the data
   $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
   $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
   $duplicateUserPassword = filter_input(INPUT_POST, 'duplicateUserPassword', FILTER_SANITIZE_STRING);
   
   if ($userPassword != $duplicateUserPassword) {
	   $_SESSION['nomatchmessage'] = "<p class='messagefailure' style='color:red'>The passwords that you have entered do not match. Please, check your password and try again.</p>";
   }
    
   $pattern = '/[A-Za-z\d]{7,}/';
 $checkedUserPassword = preg_match($pattern, $userPassword);
 
 // If the password doesn't match the pattern
   // and return to the login view
   if($checkedUserPassword == 0) {
    $_SESSION['message'] = "<p class='messagefailure'>Please, check your password and try again.</p>";
    header("Location: sign-up_page.php");
    exit;
   }
       
   // Hash the checked password
   $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
  
   
   
   $stmt = $db->prepare('INSERT INTO useraccounts (username, password) VALUES (:username, :userpassword)'); 
 $stmt->bindValue(':username', $userName, PDO::PARAM_STR);
 $stmt->bindValue(':userpassword', $hashedPassword, PDO::PARAM_STR);
$stmt->execute();

$signUpOutcome = $stmt->rowCount();

   
   // Check and report the result and create the cookie when the individual registers with the site
   if($signUpOutcome === 1){
    $_SESSION['message'] = "<p class='messagesuccess'>Thanks for registering. Please, use your email and password to login.</p>";
    header("Location: sign-in_page.php");
   exit;
   } else {
    $message = "<p class='messagefailure'>Sorry, but the registration failed. Please, try again.</p>";
	header("Location: sign-up_page.php");
    exit;
   }
   
}
 ?>
 
 </main>
 </body>
</html>