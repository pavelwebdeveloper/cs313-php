<!DOCTYPE html>
<html>
<head>
<title>Scriptures</title>
</head>
<body>
<?php
// Connecting to database
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

echo "<h1>Scripture Resources</h1>";

/*
$stmt = $db->prepare('SELECT * FROM Scriptures WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<b>' . $row['book'] . '</b>' . $row['chapter'] . ':' . $row['verse'] . '-' . $row['content'] . '<br/>';
}

?>


</body>
</html>