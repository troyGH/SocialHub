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

    try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $dbusername, $dbpassword);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = 
                "SELECT URL, FirstName, LastName, Age, City, State, Occupation 
                FROM profile WHERE FirstName = '$q'";
        
        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

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
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>
</body>

</html>

