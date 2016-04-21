<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Social Hub - Social Networking Site</title>
	 <link rel="stylesheet" href="external/style.css" />
	 <script type = "text/javascript" src="external/JSScript.js"></script>
</head>
<body>

	<div class="wrapper">
		<header>
			<canvas id="myCanvas" width="100" height="100" style="border:1px solid #d3d3d3;">
			Your browser does not support HTML5 canvas.
			</canvas>
			<h1>Social Networking Site</h1>
			<nav> 
				<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="signup.html">Signup</a></li>
				<li><a href="login.html">Login</a></li>
				<li><a href="account.html">Account</a></li>
				</ul>
			</nav>
		</header>	
		<section>
	
		<br>
		<h2>Previous searches: </h2>
		<br>

		<?php
			session_start();

			//$_SESSION["productTitle"] = $productTitle;

			if (empty($_SESSION['count'])) {
				$productTitle = isset($_POST['productTitle']) ? $_POST['productTitle'] : '';
				$_SESSION['count'] = 1;
				$_SESSION['productList'][$_SESSION['count']] = $productTitle;
			} else {
				$productTitle = isset($_POST['productTitle']) ? $_POST['productTitle'] : '';
				$_SESSION['count'] = $_SESSION['count'] + 1; 
				$_SESSION['productList'][$_SESSION['count']] = $productTitle;			
			}

			foreach ($_SESSION['productList'] as $title) {
				echo $title;
				echo "<br>";
			}

		?>

		<br>
		<form action="productsession.php" method="post" onsubmit = "return productValidate()" >
			<fieldset name="userInput">
			<h2> Product Search? </h2>
			<p>
				Enter product: 
				<br>
				<input type = "text" name = "productTitle" id = "title">
				<br>
				<input type = "submit" value = "Submit" />
			</fieldset>
		</form>
		<a href="profile.php"> View profile</a>
		<br>	
		<a href="signout.php"> Back to Login Page (Log out)</a>

	</section>
	</div>
	</body>
</html>



