<?php 

// Start the session
session_start();

 $deleteProductGroupOutcome = $_SESSION['deleteProductGroupOutcome'];

 // Check and report the result
   if($deleteProductGroupOutcome === 1){
	   $_SESSION['message'] = "<p class='messagesuccess'>The product group " . $productGroupName['productgroupname'] . " has successfully been deleted.</p>";
   header('location: manage_departmentgroup.php');
   exit;
   } else {
    $_SESSION['message'] = "<p class='messagefailure'>Sorry, deleting the product group " . $productGroupName['productgroupname'] . " has failed. Please, try again.</p>";
            header('location: manage_departmentgroup.php');
    exit;
   }
 
 
 
 
 ?>