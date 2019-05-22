<!DOCTYPE html>
<html>
<head>
<title>Scriptures</title>
</head>
<body>
<?php

 // Get the database connection file
 require_once '../../library/connections.php';
 
 //include '../../library/connections.php';
 
 $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 
 var_dump($id);
 echo "<br>";
 echo "<br>";
 
 $stmt = $db->prepare('SELECT content FROM Scriptures WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
var_dump($stmt);
echo "<br>";
 echo "<br>";
$scripture = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($scripture);
echo "<br>";
 echo "<br>";

if (isset($scripture)) {
  echo '<p>' . $scripture['content'] . '</p><br><br>';
}

?>

</body>
</html>