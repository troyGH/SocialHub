<?php require_once 'config.php'?>
<?php
	session_start();

   try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $db_user, $db_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
			$query ="SELECT FirstName, LastName 
					FROM user";
		
         print "<table border='1'>
            \n";

            // Fetch the database field names.
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
			
			if($result->rowCount()!==0){
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

           
			}else{
				
				print "the user doesn't exist.";
			}
			  print "</table>\n";
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>

