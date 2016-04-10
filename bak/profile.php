<!DOCTYPE html>

<html>
<body>
	<?php
	session_start();
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "jeff1239210";
     
	$temp = $_SESSION["username"];
	
	try {
        // Connect to the database.
        $con = new PDO("mysql:host=localhost;dbname=social_network", "root", "jeff1239210");
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
	<a href="LoginPage.html"> Back to Login Page </a>

</body>
</html>