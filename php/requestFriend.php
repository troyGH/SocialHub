<?php require_once 'config.php'?>
<?php
	session_start();
    $uname = $_POST["requestName"];
	$uid = $_SESSION["UserID"];

    try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $db_user, $db_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//getting Friend's ID first
        $query = 
                "SELECT UserID
                 FROM user WHERE FirstName = '$uname'";
        
            // Fetch the database field names.
            $result = $con->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
         
		if($result->rowCount() ==0){	
                
				print "the user name doesn't exist.";
		}else{
			foreach ($row as $name => $value) {
                      $friendID = $value;
                }
		
		
			//check if user is adding himself
			if($uid !== $friendID){
				
				//check if they are already friends
				$query = 
					"SELECT *
					FROM request WHERE UserID = '$uid' AND FriendID = '$friendID'";
  
				$result = $con->query($query);
				

				if($result->rowCount()!==0){
					print "You send the adding friend request already.";
				}else{
					
					//check if they are already friend
					$query = "SELECT * FROM friendship WHERE UserID = '$uid' AND FriendsID = '$friendID'";
  
					$result = $con->query($query);
					
					if($result->rowCount()!==0){
						print "the user is already your friend.";
					}else{
						
							//insert into friendship table
							$query = "INSERT INTO request (UserID, FriendID)
										VALUES ('$uid', '$friendID')";
							$con->exec($query);
						
							echo "Request is sent";  
					}
				}
		    }else{
				echo "You can't add yourself as a friend...";
			}
		}
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>
</body>
</html>

