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
	<?php
	session_start();

    include 'connection.php';
     
	$temp = $_SESSION["username"];
	
	try {
        // Connect to the database.
        $con = new PDO("mysql:host=localhost;dbname=social_network", $dbusername, $dbpassword);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $query = 
                "SELECT URL, FirstName, LastName, Age, City, State, Occupation 
                FROM profile 
                INNER JOIN userprofile ON userprofile.ProfileID = profile.ProfileID
                INNER JOIN user ON user.UserID = userprofile.UserID
                WHERE User.Username = '$temp'";

        print "<table border='1'>
            \n";

            // Fetch the database field names.
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            // Construct the header row of the HTML table.
            print "
            <tr>
                \n";
                foreach ($row as $field => $value) {
                print "
                <th>$field</th>\n";
                }
                print "
            <tr>
                \n";

      
                // Fetch the matching database table rows.
                $data = $con->query($query);
                $data->setFetchMode(PDO::FETCH_ASSOC);

                // Construct the HTML table row by row.
                foreach ($data as $row) {
                print "
            <tr>
                \n";

                foreach ($row as $name => $value) {
                print "
                <td>$value</td>\n";
                }

                print "
            </tr>\n";
            }

            print "</table>\n";
        }
        catch(PDOException $ex) {
        echo 'ERROR: '.$ex->getMessage();
        }
	?>

	<br>
	<a href="UserPage.html"> Back to User Page </a>
	</div>
</body>
</html>