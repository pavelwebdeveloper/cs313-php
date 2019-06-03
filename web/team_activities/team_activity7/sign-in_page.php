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
  <title>SignIn</title>
 </head>
 <body>
 
 <main>
 
 
 <div>
 <?php
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
   ?>
 <form method="post" action="sign-in_page.php">
 <label for="userName">Name:</label><br>
<input type="text" id="userName" name="userName" pattern="[A-Za-z ]{2,}" <?php if(isset($userName)){echo "value='$userName'";} ?> required><br>
<label for="userPassword">Password:</label><br>
<input type="password" name="userPassword" id="userPassword" pattern="(?=^.{7,}$)(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>
<input class="submitButton" type="submit" value="Log in">
<input type="hidden" name="LogIn" value="logIn">
<br>
<p id="login">Not registered yet?</p>
<button type="button"><a id="aregister" href="sign-up_page.php" title="a link to a sign_up page">Sign Up</a></button>
</form>
 </div>
 
 <?php
 
if(isset($_POST['LogIn'])) {
	// Filter and store the data
   $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
   $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);

   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){7,}$/';
 $checkedUserPassword = preg_match($pattern, $userPassword);
 
 // If the password doesn't match the pattern
   // and return to the login view
   if($checkedUserPassword == 0) {
    $_SESSION['message'] = "<p class='messagefailure'>Please, check your password and try again.</p>";
    header("Location: sign-in_page.php");
    exit;
   }
 
 var_dump($userName);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($userPassword);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	var_dump($checkedUserPassword);
	echo "<br>";
	echo "<br>";
	echo "<br>";
   
   
   
   // Query the client data based on the email address
   $getUserData = $db->prepare('SELECT id, username, password FROM useraccounts WHERE username=:userName');
$getUserData->bindValue(':username', $userName, PDO::PARAM_STR);
$getUserData->execute();
$userData = $getUserData->fetch(PDO::FETCH_ASSOC);

	  
   
   // Compare the password just submitted against
   // the hashed password for the matching client
   $hashCheck = password_verify($checkedUserPassword, $userData['password']);
   
	  
   // If the hashes don't match create an error
   // and return to the login view
   if(!$hashCheck) {
    $_SESSION['message'] = "<p class='messagefailure'>Please, check your password and try again.</p>";
    header("Location: sign-in_page.php");
    exit;
   }
    // A valid user exists, log them in
   $_SESSION['loggedin'] = TRUE;
   // Remove the password from the array
   // the array_pop function removes the last
   // element from an array
   array_pop($userData);
   // Store the array into the session
   $_SESSION['userData'] = $userData;
   $_SESSION['message'] = '';
   // Send them to the admin view
   header("Location: welcome_page.php");
   exit;
   
}

 ?>
 
 
 
 </main>
 </body>
</html>