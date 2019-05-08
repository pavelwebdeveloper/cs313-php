<!DOCTYPE html>
<html>
<head>
<title>Team Activity 2</title>
</head>
<body>

<?php
// define variables and set to empty values
$name = $email = $major = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	// Check if name contains only letters and whitespace
	$name = test_input($_POST["email"]);
	$name = test_input($_POST["major"]);
	$name = test_input($_POST["comment"]);
}

function test_form_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="name">Name:</label>
<input type="text" name="name"><br>
<label for="email">E-mail:</label>
<input type="text" name="email"><br>
<label for="major">Major:</label><br>
<input type="radio" name="major" value="computer science">Computer Science
<br>
<input type="radio" name="major" value="web design and development">Web Design and Development
<br>
<input type="radio" name="major" value="computer information technology">Computer information Technology
<br>
<input type="radio" name="major" value="computer engineering">Computer Engineering
<br>
<label for="comment">Comments:</label>
<textarea name="comment" rows="10" cols="50"></textarea>
<br>
<input type="submit" value="Submit">
</form>

<?php 
echo "<label for="name">Name: ".$name."</label>
<br>
<label for="email">E-mail: "$email."</label>
<br>
<label for="major">Major: ".$major."</label>
<br>
<label for="comment">Comments: ".$comment."</label>"
?>

</body>
</html>