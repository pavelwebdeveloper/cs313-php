<?php
// Get the database connection file
 require("../../library/dbConnection.php");
 $db = dbConnection();
?>
<!DOCTYPE html>
<html>
<head>
<title>Scriptures and Topics Entry</title>
</head>
<body>

<h3>Please, enter a scripture and specify appropriate topics for this scripture</h3>

<form method="post" action="process_data.php">
<label for="book">Book:</label>
<input type="text" name="book"><br>
<label for="chapter">Chapter:</label>
<input type="text" name="chapter"><br>
<label for="verse">Verse:</label><br>
<input type="text" name="verse"><br>
<label for="content">Content:</label>
<textarea name="content" rows="20" cols="100"></textarea>
<br>
<?php


$stmt = $db->prepare('SELECT * FROM topic');
$stmt->execute();
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

echo "<br>";
var_dump($topics);
  echo "<br>";


foreach ($topics as $topic)
{
echo "<input type='checkbox' name='topic" . $topic['id'] . "' value='" . $topic['id'] . "'>" . $topic['name'] . "<br>";
/*
if($topic['id'] == 1) {
	$topic1 = 1;
}
if($topic['id'] == 2) {
	$topic2 = 2;
}
if($topic['id'] == 3) {
	$topic3 = 3;
}
*/
}



  
  echo "<br>";
var_dump($topic1);
  echo "<br>";



?>
<!--<input type="hidden" name="lastScripture_id" value="$lastScripture_id">
<input type="hidden" name="rowsChangedForTopic1" value="$rowsChangedForTopic1">-->
<input type="submit" value="Submit">
</form>

<?php

 
 
 //include '../../library/connections.php';
 

echo "<h1>Scripture Resources</h1>";

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br><br>';
}


echo "<h1>Scripture Links</h1>";

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<a href="scripture_details.php?id=' . $row['id'] . '">' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</a><br><br>';
}

var_dump($db);
echo "<br>";
echo "<br>";
var_dump($row);
?>

<form method="post" action="team_activity5.php">
<label for="name">Search for book:</label>
<input type="text" id="name" name="name"><br>
<input type="submit" value="Submit">
</form>



<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

$stmt = $db->prepare('SELECT * FROM Scriptures WHERE book=:name');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($rows)) {
foreach ($rows as $row2)
{
  echo '<b>' . $row2['book'] . ' </b>' . $row2['chapter'] . ':' . $row2['verse'] . ' - "' . $row2['content'] . '"<br><br>';
}
}



?>

</body>
</html>