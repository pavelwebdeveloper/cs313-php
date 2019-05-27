<!DOCTYPE html>
<html>
<head>
<title>Scriptures</title>
</head>
<body>

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
echo "<input type='checkbox' name='topic1' value='1'> Faith<br>
  <input type='checkbox' name='topic2' value='2'> Sacrifice <br>
  <input type='checkbox' name='topic3' value='3'> Charity ";

?>
<input type="submit" value="Submit">
</form>

<?php

 // Get the database connection file
 require_once '../../library/connections.php';
 
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