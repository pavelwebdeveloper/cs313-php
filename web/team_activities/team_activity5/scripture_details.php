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
 
 
 $stmt = $db->prepare('SELECT * FROM Scriptures WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
var_dump($stmt);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($scripture)) {
  echo '<p>' . $scripture['content'] . '</p><br><br>';
}

?>

</body>
</html>