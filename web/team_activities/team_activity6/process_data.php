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
  echo "<br>";
 
 $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
 $chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_STRING);
 $verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_STRING);
 $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
 $topic1 = filter_input(INPUT_POST, 'topic1', FILTER_SANITIZE_STRING);
 $topic2 = filter_input(INPUT_POST, 'topic2', FILTER_SANITIZE_STRING);
 $topic3 = filter_input(INPUT_POST, 'topic3', FILTER_SANITIZE_STRING);
 var_dump($book);
  echo "<br>";
   
 var_dump($chapter);
  echo "<br>";
 var_dump($verse);
  echo "<br>";
 var_dump($content);
  echo "<br>";
 
 
 var_dump($topic1);
  echo "<br>";
  var_dump($topic2);
  echo "<br>";
  var_dump($topic3);
  echo "<br>";
  
 
 
 $stmt = $db->prepare('INSERT INTO Scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
$stmt->bindValue(':book', $book, PDO::PARAM_STR);
$stmt->bindValue(':chapter', $chapter, PDO::PARAM_STR);
 $stmt->bindValue(':verse', $verse, PDO::PARAM_STR);
 $stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();
$rowsChanged = $stmt->rowCount();

echo "Insert into Scriptures";
var_dump($rowsChanged);
  echo "<br>";


$stmt = $db->prepare('SELECT id FROM Scriptures WHERE content=:content');
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->execute();
$scripture_id = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Scripture id";
echo "<br>";
var_dump($scripture_id);
  echo "<br>";



$stmt = $db->prepare('INSERT INTO Scriptures_topic (scriptures_id, topic_id) VALUES (:scripture_id, :topic1)');
echo "$stmt";
echo "<br>";
var_dump($stmt);
$stmt->bindValue(':scripture_id', $scripture_id, PDO::PARAM_INT);
$stmt->bindValue(':topic1', $topic1, PDO::PARAM_STR);
$stmt->execute();
$rowsChangedForTopic1 = $stmt->rowCount();



echo "Insert into Scriptures_topic1";
echo "<br>";
var_dump($rowsChangedForTopic1);
  echo "<br>";

/*
if(isset($topic2)) {
	$stmt = $db->prepare('INSERT INTO Scriptures_topic (scriptures_id, topic_id) VALUES (:scripture_id, :topic2)');
$stmt->bindValue(':scripture_id', $scripture_id, PDO::PARAM_STR);
$stmt->bindValue(':topic2', $topic2, PDO::PARAM_INT);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
}

if(isset($topic3)) {
	$stmt = $db->prepare('INSERT INTO Scriptures_topic (scriptures_id, topic_id) VALUES (:scripture_id, :topic3)');
$stmt->bindValue(':scripture_id', $scripture_id, PDO::PARAM_STR);
$stmt->bindValue(':topic3', $topic3, PDO::PARAM_INT);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
}

$stmt = $db->prepare('SELECT * FROM Scriptures_topic');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($results)) {
  foreach ($results as $result)
{
  echo '<b>' . $result['scriptures_id'] . ' </b>' . $result['topic_id'] . '<br><br>';
}
}
*/
?>

</body>
</html>