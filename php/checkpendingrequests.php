<?php require_once 'config.php'?>
<?php
session_start();
$uid = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';

try{
	
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    $uid = $_POST['uid'];
	$myid = $_SESSION['UserID'];
	
	$stmt = $conn->prepare("SELECT *
							FROM request
							WHERE UserID = $myid AND FriendID = $uid");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	if($result){   
		echo "true";
	}
			
}
catch(PDOException $ex) {
   // echo 'ERROR: ' . $ex->getMessage();
}
?>