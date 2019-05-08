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
<label for="covisited continents">I have visited the following continents:</label><br>
<input type="checkbox" name="continent1" value="North America">North America<br>
<input type="checkbox" name="continent2" value="South America">South America<br>
<input type="checkbox" name="continent3" value="Europe">Europe<br>
<input type="checkbox" name="continent4" value="Asia">Asia<br>
<input type="checkbox" name="continent5" value="Australia">Australia<br>
<input type="checkbox" name="continent6" value="Africa">Africa<br>
<input type="checkbox" name="continent7" value="Antarctica">Antarctica<br>
<input type="submit" value="Submit">
</form>

</body>
</html>