<!DOCTYPE html>
<html>
<head>
<title>Scriptures</title>
</head>
<body>
<?php

 // Get the database connection file
 require_once '../../library/connections.php';

echo "<h1>Scripture Resources</h1>";

/*
$stmt = $db->prepare('SELECT * FROM Scriptures WHERE name=:name');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . ' - "' . $row['content'] . '"<br><br>';
}

?>

<form method="post" action="team_activity5.php">
<label for="name">Search for book:</label>
<input type="text" id="bookName" name="name"><br>
</form>

<?php
/*
$bookName = filter_input(INPUT_POST, 'bookName', FILTER_SANITIZE_STRING);
$name = findBooks($bookName);
fuction findBooks($bookName) {
	
};
*/
var_dump($_POST);
?>

</body>
</html>