<?php
// Start the session
session_start();
if(!($_SESSION['loggedin'])){header('Location: home.php');}
if(!$_SESSION['userData']['userlevel'] > 1) {header('Location: manage_account.php');}
// Create an array for the shopping cart in the session
if (!isset($_SESSION['shoppingCart'])) {
 $_SESSION['shoppingCart'] = array();
 $_SESSION['products'] = array();
}
?>
<!DOCTYPE html>
<html lang="en-us" id="logInRegister">
 <head>
  <title>Manage Product Department and Product Group Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
  <link href="css/normalize.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main>
 <?php
 // Get the database connection file
 require_once '../library/connections.php';
 var_dump($_POST);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Hi";
// Query the product department data
   $getDepartment = $db->prepare('SELECT * FROM productdepartment');
$getDepartment->execute();
$departments = $getDepartment->fetchAll(PDO::FETCH_ASSOC);
 // Build a dynamic drop-down select list using the $departments array
 $departmentList .= '<select name="departmentId" id="departmentId">';
 $departmentList .= '<option disabled selected>Choose a department</option>';
 foreach ($departments as $department) {
 /*$catList .= "<option value=".urlencode($category['categoryId']).">".urlencode($category['categoryName'])."</option>";*/
  $departmentList .= "<option value='$department[id]'";
  if(isset($departmentId)) {
   
   if($department['id'] === $departmentId){
    $departmentList .= ' selected ';
   }
  }
  
  $departmentList .= ">$department[productdepartmentname]</option>";
 }
 $departmentList .= '</select>';
 
 // Query the product groups data
   $getProductGroups = $db->prepare('SELECT * FROM productgroup');
$getProductGroups->execute();
$productGroups = $getProductGroups->fetchAll(PDO::FETCH_ASSOC);
 // Build a dynamic drop-down select list using the $productGroups array
 $productGroupsList .= '<select name="productGroupId" id="productGroupId">';
 $productGroupsList .= '<option disabled selected>Choose a product group</option>';
 foreach ($productGroups as $productGroup) {
 /*$catList .= "<option value=".urlencode($category['categoryId']).">".urlencode($category['categoryName'])."</option>";*/
  $productGroupsList .= "<option value='$productGroup[id]'";
  if(isset($productGroupId)) {
   
   if($productGroup['id'] === $productGroupId){
    $productGroupsList .= ' selected ';
   }
  }
  
  $productGroupsList .= ">$productGroup[productgroupname]</option>";
 }
 $productGroupsList .= '</select>';
 
 ?>
 
 <div>
 <?php
   if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
   }
   ?>
   <form action="manage_departmentgroup.php" method="post">
    <fieldset>
	<legend>Add product department</legend>
     <label for="departmentName">Department Name</label>
     <input type="text" name="departmentName" id="departmentName" pattern="[A-Za-z]{3,}" required><br>
     <input class="submitBtn" type="submit" value="Add Department">
     <!-- Add the action name - value pair -->
     <input type="hidden" name="NewDepartment" value="newDepartment">
    </fieldset>
   </form>
   
   <?php
if(isset($_POST['NewDepartment'])) {
	/*
	echo "<br>";
echo "HIHIHI";
echo "<br>";	
*/

	// Filter and store the data
	$departmentName = filter_input(INPUT_POST, 'departmentName', FILTER_SANITIZE_STRING);	
	echo "$departmentName";
	var_dump($departmentName);
echo "<br>";
echo "<br>";
echo "<br>";   
   // validate the categoryName variable using a custom function from functions.php
   $pattern = '/^[A-Za-z]{3,}$/';
 $checkedDepartmentName = preg_match($pattern, $departmentName);   
   // Check for missing data
   if(empty($checkedDepartmentName)){
    $_SESSION['message'] = '<p class="message">Please, provide a new department name.</p>';
    header('location: manage_departmentgroup.php');
    exit;
   }   
   $stmt = $db->prepare('INSERT INTO productdepartment (productdepartmentname) VALUES (:departmentName)'); 
 $stmt->bindValue(':departmentName', $departmentName, PDO::PARAM_STR);
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
   $adddepartmentOutcome = $stmt->rowCount();
   
   // Check and report the result
   if($adddepartmentOutcome === 1){
	   $_SESSION['message'] = "<p class='messagesuccess'>The new department " . $departmentName . " has successfully been added.</p>";
	   header('location: manage_departmentgroup.php');
   exit;
   } else {
    $_SESSION['message'] = "<p class='messagefailure'>Sorry, adding the new department " . $departmentName . " has failed. Please, try again.</p>";
            header('location: manage_departmentgroup.php');
    exit;
   }
}
	
	?>
   
  
   <form action="manage_departmentgroup.php" method="post">
    <fieldset>
	<legend>Remove product department</legend>
     <label for="departmentName">Department Name</label>
     <?php
	echo $departmentList;
 ?>
	 <input class="submitBtn" type="submit" value="Remove Department">
     <!-- Add the action name - value pair -->
     <input type="hidden" name="RemoveDepartment" value="removeDepartment">
    </fieldset>
   </form>
   
   <?php
if(isset($_POST['RemoveDepartment'])) {
	/*
	echo "<br>";
echo "HIHIHI";
echo "<br>";	
*/

	// Filter and store the data
	$departmentId = filter_input(INPUT_POST, 'departmentId', FILTER_SANITIZE_NUMBER_INT);	
	
	 
	 $getName = $db->prepare('SELECT productdepartmentname FROM productdepartment WHERE id=:departmentId'); 
 $getName->bindValue(':departmentId', $departmentId, PDO::PARAM_INT);
$getName->execute();
$departmentName = $getName->fetch(PDO::FETCH_ASSOC);


// Check for missing data
   if(empty($departmentId)){
    $_SESSION['message'] = '<p class="message">Please, choose a department name for removal.</p>';
    header('location: manage_departmentgroup.php');
    exit;
   }   
   $stmt = $db->prepare('DELETE FROM productdepartment WHERE id=:departmentId'); 
 $stmt->bindValue(':departmentId', $departmentId, PDO::PARAM_INT);
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
   $deleteDepartmentOutcome = $stmt->rowCount();
   
   echo "DELETEDDEPARTMENT";
   var_dump($deleteDepartmentOutcome);
echo "<br>";
echo "<br>";
   
   // Check and report the result
   if($deleteDepartmentOutcome === 1){
	   $_SESSION['message'] = "<p class='messagesuccess'>The department " . $departmentName['productdepartmentname'] . " has successfully been deleted.</p>";
   header('location: manage_departmentgroup.php');
   exit;
   } else {
    $_SESSION['message'] = "<p class='messagefailure'>Sorry, deleting the department " . $departmentName['productdepartmentname'] . " has failed. Please, try again.</p>";
            header('location: manage_departmentgroup.php');
    exit;
   }
   
}
	
	?>
   
   <form action="manage_departmentgroup.php" method="post">
    <fieldset>
	<legend>Add product group</legend>
	<?php
	echo $departmentList;
 ?>
     <label for="productGroupName">New Product Group Name</label>
     <input type="text" name="productGroupName" id="productGroupName" pattern="[A-Z][a-z]{3,}" required><br>
     <input class="submitBtn" type="submit" value="Add Product Group">
     <!-- Add the action name - value pair -->
     <input type="hidden" name="AddNewProductGroup" value="addNewProductGroup">
    </fieldset>
   </form>
   
   <?php
if(isset($_POST['AddNewProductGroup'])) {
	/*
	echo "<br>";
echo "HIHIHI";
echo "<br>";	
*/

	// Filter and store the data
	$departmentId = filter_input(INPUT_POST, 'departmentId', FILTER_SANITIZE_NUMBER_INT);	
	$productGroupName = filter_input(INPUT_POST, 'productGroupName', FILTER_SANITIZE_STRING);	
	  
   // validate the categoryName variable using a custom function from functions.php
   $pattern = '/^[A-Za-z]{3,}$/';
 $checkedproductGroupName = preg_match($pattern, $productGroupName);   
   // Check for missing data
   if(empty($checkedproductGroupName) || empty($departmentId)){
    $_SESSION['message'] = '<p class="message">Please, choose a department name and provide a new product group name.</p>';
    header('location: manage_departmentgroup.php');
    exit;
   }   
   $stmt = $db->prepare('INSERT INTO productgroup (productgroupname, productdepartmentId) VALUES (:productGroupName, :departmentId)'); 
 $stmt->bindValue(':productGroupName', $productGroupName, PDO::PARAM_STR);
 $stmt->bindValue(':departmentId', $departmentId, PDO::PARAM_INT);
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
   $addProductGroupOutcome = $stmt->rowCount();
   
   // Check and report the result
   if($addProductGroupOutcome === 1){
	   $_SESSION['message'] = "<p class='messagesuccess'>The new product group " . $productGroupName . " has successfully been added.</p>";
   header('location: manage_departmentgroup.php');
   exit;
   } else {
    $_SESSION['message'] = "<p class='messagefailure'>Sorry, adding the new product group " . $productGroupName . " has failed. Please, try again.</p>";
            header('location: manage_departmentgroup.php');
    exit;
   }
}
?>
   
   <form action="delete_productgroup.php" method="post">
    <fieldset>
	<legend>Remove product group</legend>	
     <label for="productGroupName">Product Group Name</label>
	 <?php
	echo $productGroupsList;
 ?>
	 <input class="submitBtn" type="submit" value="Remove Product Group">
     <!-- Add the action name - value pair -->
     <input type="hidden" name="RemoveProductGroup" value="removeProductGroup">
    </fieldset>
   </form>
   </div>
   
   
   
   
 
   
 </main>
 <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>