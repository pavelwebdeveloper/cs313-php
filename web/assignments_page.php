<!DOCTYPE html>
<html lang="en-us">
 <head>
  <title>Assignments Page</title>
  <link href="css/home.css" rel="stylesheet" media="screen">
 </head>
 <body>
 <header>
 <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/common/header.php'; ?>
 </header>
  <main>
  <h1 id="assignmentsheading">The results for assignments</h1>
  <br>
  <div id="activities">
  <div id="teamactivities">
  <h2>The results for team assignments</h2>
  <a href="/team_activities/team_activity2/team_activity2.html">Team Activity 2</a>
  <br>
  <a href="/team_activities/team_activity3/team_activity3.php">Team Activity 3</a>
  <br>
  <a href="/team_activities/team_activity5/team_activity5.php">Team Activity 5</a>
  </div>
  <div id="proveactivities">
  <h2>The results for prove assignments</h2>
  <a href="/assignments/browse_products.php">Shopping Cart</a>
  <br>
  </div>
  </div>
  </main>
  <footer>
  <?php include $_SERVER[ 'DOCUMENT_ROOT' ].'/common/footer.php'; ?>
  </footer>
 </body>
</html>