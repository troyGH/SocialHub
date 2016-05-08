<?php require_once 'config.php'?>
<?php
	session_start();
	
	$uid = $_SESSION["UserID"];
	$fid = $_POST["FriendID"];

	//$num = isset($_POST["num"]);
	
   try {
		$con = new PDO("mysql:host=localhost;dbname=social_network", $db_user, $db_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
					$query = "DELETE FROM request WHERE UserID = '$uid' AND FriendID= '$fid'";
								
					$con->exec($query);
					
					$query = "DELETE FROM request WHERE UserID = '$fid' AND FriendID= '$uid'";
					$con->exec($query);
					
					print "Friend Request is cancelled";  

	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
?>

