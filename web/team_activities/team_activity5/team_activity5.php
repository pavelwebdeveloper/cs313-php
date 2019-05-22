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
 

echo "<h1>Scripture Resources</h1>";

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . ' - "' . $row['content'] . '"<br><br>';
}


echo "<h1>Scripture Links</h1>";

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<a href="scripture_details.php?id=' . $row['id'] . '><b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . '</a><br><br>';
}
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