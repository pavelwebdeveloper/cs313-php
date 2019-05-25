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
<html lang="en-us">
 <head>
  <title>Home Page</title>
  <link href="css/online_store_styles.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/header.php'; ?>
 </header>
 <main id="homepage">
 
 <div id="homepagediv">
 <section>
 <nav>
 <?php
 
 
 echo '<ul>';
 foreach ($db->query('SELECT * FROM productdepartment') as $row)
{	
 echo '<li><a href="productgroups.php?id=' . $row['id'] . '">' . $row['productdepartmentname'] . '</a></li>';
}
echo '</ul>';

var_dump($db);
echo "<br>";
echo "<br>";
var_dump($row);
 
 ?>
 </nav>
 </section>
 <section>
 </section>
 <div>
 
 </main>

  
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/assignments/common/footer.php'; ?>
  </footer>
 </body>
</html>