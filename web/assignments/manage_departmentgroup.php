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
// Query the product department data based on the email address
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

	
}
	
	?>
   
   <form action="manage_departmentgroup.php" method="post">
    <fieldset>
	<legend>Add or remove product group</legend>
	<?php
	echo $departmentList;
 ?>
     <label for="productGroupName">Product Group Name</label>
     <input type="text" name="productGroupName" id="productGroupName" pattern="[A-Z][a-z]{3,}" required><br>
     <input class="submitBtn" type="submit" value="Add Product Group">
     <!-- Add the action name - value pair -->
     <input type="hidden" name="action" value="newProductGroup">
	 <input class="submitBtn" type="submit" value="Remove Product Group">
     <!-- Add the action name - value pair -->
     <input type="hidden" name="action" value="removeProductGroup">
    </fieldset>
   </form>
   </div>
   
   
   
 
   
 </main>
 <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>