<?php require_once 'config.php'?>
<?php
	session_start();
	
	$uid = $_SESSION["UserID"];
	$_SESSION['Friendcount'] = 0;
	
   try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $db_user, $db_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
			$query ="SELECT UserID, FirstName, LastName
					FROM user
					WHERE UserID IN (SELECT UserID FROM friendship WHERE friendship.FriendsID = '$uid')";
      
            // Fetch the database field names.
            $result = $con->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
			
			if($result->rowCount()!==0){
				
                // Construct the HTML table row by row.
                foreach ($result as $row) {
                
					
						$_SESSION['Friendcount'] = $_SESSION['Friendcount'] + 1; 
						$_SESSION['FriendFrom'][$_SESSION['count']] = $row['UserID'];
						
						
						$_SESSION['FriendFirstName'][$_SESSION['Friendcount']] = $row['FirstName'];
						$_SESSION['FriendLastName'][$_SESSION['Friendcount']] = $row['LastName'];
								
							
			
				}	
			}
			  
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	
	
	$response = array(
					"auth" => $_SESSION['LoggedIn'],
					"count" => $_SESSION['Friendcount'],
					"friendArray" => $_SESSION['FriendFrom'],
					"friendFirstName" => $_SESSION['FriendFirstName'],
					"friendLastName" => $_SESSION['FriendLastName']
					);
		echo json_encode($response);
	?>

