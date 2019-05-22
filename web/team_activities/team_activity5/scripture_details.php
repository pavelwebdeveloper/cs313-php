<!DOCTYPE html>
<html>
<head>
<title>Scriptures Details</title>
</head>
<body>
<?php

 // Get the database connection file
 require_once '../../library/connections.php';
 
 //include '../../library/connections.php';
 
 echo "<h1>Scripture Details</h1>";
 echo "<br>";
 
 $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 
 
 
 $stmt = $db->prepare('SELECT * FROM Scriptures WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$scripture = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($scripture)) {
  echo '<p><b>' . $scripture['book'] . ' ' . $scripture['chapter'] . ':' . $scripture['verse'] . '</b> - "' . $scripture['content'] . '"</p><br><br>';
}

?>

</body>
</html>