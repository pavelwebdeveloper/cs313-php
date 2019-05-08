<!DOCTYPE html>
<html>
<head>
<title>Submittied form results</title>
</head>
<body>
<?php
echo "Hello";

var_dump($_POST);

// define variables and set to empty values
$name = $email = $major = $comment = "1";

var_dump($major);
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	// Check if name contains only letters and whitespace
	$name = test_input($_POST["email"]);
	$name = test_input($_POST["major"]);
	$name = test_input($_POST["comment"]);
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
echo "<label for="name">Name: ".$name."</label>
<br>
<label for="email">E-mail: "$email."</label>
<br>
<label for="major">Major: ".$major."</label>
<br>
<label for="comment">Comments: ".$comment."</label>";
?>
*/

</body>
</html>