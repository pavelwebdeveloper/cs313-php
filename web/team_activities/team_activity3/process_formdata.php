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
	$name = $_POST["name"];
	// Check if name contains only letters and whitespace
	$email = $_POST["email"];
	$major = $_POST["major"];
	$comment = $_POST["comment"];
	$continent1 = $_POST["continent1"];
	$continent2 = $_POST["continent2"];
	$continent3 = $_POST["continent3"];
	$continent4 = $_POST["continent4"];
	$continent5 = $_POST["continent5"];
	$continent6 = $_POST["continent6"];
	$continent7 = $_POST["continent7"];
	
	$continents = array("$continent1" => "North America", "$continent2" => "South America", "$continent3" => "Europe", 
"$continent4" => "Asia", "$continent5" => "Australia", "$continent6" => "Africa", "$continent7" => "Antarctica"); 
array_shift($continents);
	
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
var_dump($continents);
foreach($continents as $continent) {
	echo $continent;
}

/*
echo "<label for='name'>Name: ".$name."</label><br><label for='email'>E-mail: "$email."</label><br><label for='major'>Major: ".$major."</label><br><label for='comment'>Comments: ".$comment."</label>";
*/
?>


</body>
</html>