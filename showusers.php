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
    $q = $_GET['q'];

    include 'connection.php';

    try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $dbusername, $dbpassword);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //$query = "SELECT * FROM profile WHERE profile.FirstName = '$q'";
        //$queryexe = $con->query($query);

        echo "<table>
        <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>URL</th>
        <th>Age</th>
        <th>City</th>
        <th>State</th>
        <th>Occupation</th>
        </tr>";
        /*while($result->fetch(PDO::FETCH_ASSOC)) {
        	echo "<tr>";
        	echo "<td>" . $row['FirstName'] . "</td>";
        	echo "<td>" . $row['LastName'] . "</td>";
        	echo "<td>" . $row['URL'] . "</td>";
        	echo "<td>" . $row['Age'] . "</td>";
        	echo "<td>" . $row['City'] . "</td>";
        	echo "<td>" . $row['State'] . "</td>";
        	echo "<td>" . $row['Occupation'] . "</td>";
        	echo "</tr>";
        }*/
        echo "</table>";
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>
</body>

</html>

