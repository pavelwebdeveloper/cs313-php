<?php
/*if(isset($_POST['RemoveProductGroup'])) {
	/*
	echo "<br>";
echo "HIHIHI";
echo "<br>";	
*/

// Start the session
session_start();

	// Filter and store the data
	$productGroupId = filter_input(INPUT_POST, 'productGroupId', FILTER_SANITIZE_NUMBER_INT);	
	
	 // Get the database connection file
 require_once '../library/connections.php';
	 
	 $getGroupName = $db->prepare('SELECT productgroupname FROM productgroup WHERE id=:productGroupId'); 
 $getGroupName->bindValue(':productGroupId', $productGroupId, PDO::PARAM_INT);
$getGroupName->execute();
$productGroupName = $getGroupName->fetch(PDO::FETCH_ASSOC);


// Check for missing data
   if(empty($productGroupId)){
    $_SESSION['message'] = '<p class="message">Please, choose a product group name for removal.</p>';
    header('location: manage_departmentgroup.php');
    exit;
   }   
   $stmt = $db->prepare('DELETE FROM productgroup WHERE id=:productGroupId'); 
 $stmt->bindValue(':productGroupId', $productGroupId, PDO::PARAM_INT);
$stmt->execute();




/*
var_dump($stmt);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Hi";
*/
   
   // Send the data to the model
   $deleteProductGroupOutcome = $stmt->rowCount();
   
   
   
   echo "DELETED";
   var_dump($deleteProductGroupOutcome);
   var_dump($productGroupName);
echo "<br>";
echo "<br>";



// Check and report the result
   if($deleteProductGroupOutcome == 1){
	   $_SESSION['message'] = "<p class='messagesuccess'>The product group " . $productGroupName['productgroupname'] . " has successfully been deleted.</p>";
	   if(isset($_SESSION['message'])) {
	   header('location: manage_departmentgroup.php');
	   }
   exit;
   } else {
    $_SESSION['message'] = "<p class='messagefailure'>Sorry, deleting the product group " . $productGroupName['productgroupname'] . " has failed. Please, try again.</p>";
            header('location: manage_departmentgroup.php');
    exit;
   }
   
 
   
 
//}
	
	?>