<!DOCTYPE html>
<html>
<head>
<title>Submittied form results</title>
</head>
<body>
<?php

//echo "Hello";

var_dump($_POST);
// define variables and set to empty values
$name = $email = $major = $comment = $continent1 = $continent2 = $continent3 = $continent4 = $continent5 = $continent6 = $continent7 = "";



//var_dump($major);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	// Check if name contains only letters and whitespace
	$email = test_input($_POST["email"]);
	$major = test_input($_POST["major"]);
	$comment = test_input($_POST["comment"]);
	$continent1 = test_input($_POST["continent1"]);
	$continent2 = test_input($_POST["continent2"]);
	$continent3 = test_input($_POST["continent3"]);
	$continent4 = test_input($_POST["continent4"]);
	$continent5 = test_input($_POST["continent5"]);
	$continent6 = test_input($_POST["continent6"]);
	$continent7 = test_input($_POST["continent7"]);
	
	$continents = array("$continent1" => "North America", "$continent2" => "South America", "$continent3" => "Europe", 
"$continent4" => "Asia", "$continent5" => "Australia", "$continent6" => "Africa", "$continent7" => "Antarctica"); 
	
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
/*
var_dump($major);
var_dump($_SERVER["REQUEST_METHOD"]);
*/
?>

<?php
echo "<h1>Sibmitted information</h1><br><br>";
echo "Name: ".$name."<br>E-mail: ".$email."<br>Major: ".$major."<br>Comment: ".$comment."<br>";
//echo "<h3>Visited continents:</h3>".$continent1." ".$continent2." ".$continent3." ".$continent4." ".$continent5." ".$continent6." ".$continent7;
echo "<h3>Visited continents:</h3>";
/*foreach($continents as $continent) {
	echo $continent;
}*/

/*
echo "<label for='name'>Name: ".$name."</label><br><label for='email'>E-mail: "$email."</label><br><label for='major'>Major: ".$major."</label><br><label for='comment'>Comments: ".$comment."</label>";
*/
?>


</body>
</html>