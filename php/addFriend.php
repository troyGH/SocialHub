<?php require_once 'config.php'?>
<?php
	session_start();
	
	$uid = $_SESSION["UserID"];
	$fid = $_POST["FriendID"];

	
   try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $db_user, $db_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
			
		
				//check if they are friends
				$query = 
					"SELECT *
					FROM friendship WHERE UserID = '$uid' AND FriendsID = '$fid'";
					
				$result = $con->query($query);
				
				if($result->rowCount()!==0){
					print "that user is your friend already.";
					$query = "DELETE FROM request WHERE UserID = '$fid' AND FriendID= '$uid'";
								
					$con->exec($query);
					
					$query = "DELETE FROM request WHERE UserID = '$uid' AND FriendID= '$fid'";
					$con->exec($query);
					
				}else{
					//insert into friendship table
					$query = "INSERT INTO friendship (UserID, FriendsID)
								VALUES ('$uid', '$fid')";
					$con->exec($query);
				
					$query ="INSERT INTO friendship (UserID, FriendsID)
								VALUES ('$fid', '$uid')";
					$con->exec($query);
					
					$query = "DELETE FROM request WHERE UserID = '$fid' AND FriendID= '$uid'";
								
					$con->exec($query);
					
					$query = "DELETE FROM request WHERE UserID = '$uid' AND FriendID= '$fid'";
					$con->exec($query);
					
					//take out unwanted request item
					
					echo "Your New Friend Is Added";  
					
				}
		   
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>

