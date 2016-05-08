<?php require_once 'config.php'?>
<?php
session_start();
$uid = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';

try{
	
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    $pid = $_POST['uid'];
	
	$stmt = $conn->prepare("SELECT *
							FROM friendship
							WHERE UserID = '$uid' AND FriendsID = '$pid'");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	if($uid !== $pid){
		if($result)
		{   
			echo "true";
		}else{
			
		echo "";
		}
	}else{
		echo "true";
	}
}
catch(PDOException $ex) {
   // echo 'ERROR: ' . $ex->getMessage();
}
?>
