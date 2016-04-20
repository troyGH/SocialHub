<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Social Hub - Social Networking Site</title>
	 <link rel="stylesheet" href="external/style.css" />
	 <script type = "text/javascript" src="external/JSScript.js"></script>
</head>
<body>
<?php
    $q = $_GET["q"];

    include 'connection.php';

    $temp = $_SESSION["username"];

    try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $dbusername, $dbpassword);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = 
                "SELECT URL, FirstName, LastName, Age, City, State, Occupation 
                FROM profile 
                INNER JOIN userprofile ON userprofile.ProfileID = profile.ProfileID
                INNER JOIN user ON user.UserID = userprofile.UserID
                WHERE User.Username = '$temp'";
        
        $result = $con->query($query)

        echo "$q";
        echo ":" . "$result";
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>
</body>

</html>

