
<?php require_once 'config.php'?>
<?php
session_start();

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $uid = $_POST['uid'];
	
	$stmt = $conn->prepare("SELECT FriendsID, FirstName, LastName 
							FROM `friendship`, `user` 
							WHERE friendship.UserID = $uid
							AND user.UserID = friendship.FriendsID");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	if($result)
    {
		$arr = array();
		
		foreach($result as $item){
			array_push($arr, $item);
		}
		echo json_encode($arr);
	}
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
