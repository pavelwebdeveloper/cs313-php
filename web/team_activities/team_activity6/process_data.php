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
 
 var_dump($_POST);
 /*
 $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
 $chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_STRING);
 $verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_STRING);
 $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
 $topic1 = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
 $topic2 = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
 $topic3 = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
 
 
 
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