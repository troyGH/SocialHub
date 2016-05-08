<?php require_once 'config.php'?>
<?php
	session_start();
	
	$uid = $_SESSION["UserID"];
	$_SESSION['count'] = 0;
	
   try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $db_user, $db_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
			$query ="SELECT UserID, FirstName, LastName
					FROM user
					WHERE UserID IN (SELECT UserId FROM request WHERE FriendID = '$uid')
					";
      
            // Fetch the database field names.
            $result = $con->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
			
			if($result->rowCount()!==0){
				
                // Construct the HTML table row by row.
                foreach ($result as $row) {
                
						$_SESSION['count'] = $_SESSION['count'] + 1; 
						$_SESSION['requestFrom'][$_SESSION['count']] = $row['UserID'];
						$_SESSION['RequestFirstName'][$_SESSION['count']] = $row['FirstName'];
						$_SESSION['RequestLastName'][$_SESSION['count']] = $row['LastName'];

				}	
			}
			  
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	
	
	$response = array(
					"auth" => $_SESSION['LoggedIn'],
					"count" => $_SESSION['count'],
					"requestArray" => $_SESSION['requestFrom'],
					"requestFirstName" => $_SESSION['RequestFirstName'],
					"requestLastName" => $_SESSION['RequestLastName']
					);
		echo json_encode($response);
	?>

