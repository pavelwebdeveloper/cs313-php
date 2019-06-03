<div id="upperblock">
<nav>
<a href="home.php" title="a link to Home page">Home</a>
<a href="browse_products.php" title="a link to Browse Products page">Products</a>
</nav>
<div>
<form method="post" action="browse_products.php">
<label for="name"></label>
<input type="text" id="name" name="searchProduct" placeholder="Product name">
<input type="submit" value="Search">
</form>
</div>
<div>
<a href="view_cart.php" title="a link to Shopping Cart page">Shopping Cart</a>
</div>
</div>
<div id="lowerblock">
<?php if(!($_SESSION['loggedin'])){
	echo '<div>
</div><div id="logInOrSignUp">
<a href="login_page.php" title="a link to log in">Log In</a>
<a href="signup_page.php" title="a link to sign up">Sign Up</a>
</div>';
} else {
	echo '<div><p>You are logged in as ' . $_SESSION['userData']['username'] . '</p>
</div><div id="logInOrSignUp">
<a href="manage_account.php" title="a link to account update page">Manage account</a>
<a href="home.php?action=Logout" title="a link to log out">Log Out</a>
</div>';
}
?>


</div>