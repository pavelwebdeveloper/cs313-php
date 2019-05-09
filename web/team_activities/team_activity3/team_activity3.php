<!DOCTYPE html>
<html>
<head>
<title>Team Activity 2</title>
</head>
<body>

<form method="post" action="process_formdata.php">
<label for="name">Name:</label>
<input type="text" name="name"><br>
<label for="email">E-mail:</label>
<input type="text" name="email"><br>
<label for="major">Major:</label><br>
<?php 
$majors = array("CS" => "Computer Science", "WDD" => "Web Design and Development", "CIT" => "Computer information Technology", 
"CE" => "Computer Engineering"); 
//var_dump($majors);
foreach($majors as $major) {
	echo "<input type='radio' name='major' value='".$major."'>".$major."<br>";
}
?>
<!--<input type="radio" name="major" value="computer science">Computer Science
<br>
<input type="radio" name="major" value="web design and development">Web Design and Development
<br>
<input type="radio" name="major" value="computer information technology">Computer information Technology
<br>
<input type="radio" name="major" value="computer engineering">Computer Engineering
<br>-->
<label for="comment">Comments:</label>
<textarea name="comment" rows="10" cols="50"></textarea>
<br>
<label for="covisited continents">I have visited the following continents:</label><br>
<input type="checkbox" name="continent1" value="na">North America<br>
<input type="checkbox" name="continent2" value="sa">South America<br>
<input type="checkbox" name="continent3" value="eu">Europe<br>
<input type="checkbox" name="continent4" value="as">Asia<br>
<input type="checkbox" name="continent5" value="au">Australia<br>
<input type="checkbox" name="continent6" value="af">Africa<br>
<input type="checkbox" name="continent7" value="an">Antarctica<br>
<input type="submit" value="Submit">
</form>

</body>
</html>