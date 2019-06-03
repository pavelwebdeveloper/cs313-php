<?php
// Get the database connection file
 require("../../library/dbConnection.php");
 $db = dbConnection();
// Start the session
session_start();
//if(!($_SESSION['loggedin'])){header('Location: sign-in_page.php');}
?>
<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>Welcome Page</title>
 </head>
 <body>
 
 <main>
 
 <?php
   if (isset($_SESSION['userData'])) {
    echo "Welcome " . $_SESSION['userData']['username'];
   }
   ?>
 
 </main>
 </body>
</html>