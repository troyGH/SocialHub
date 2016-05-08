
<?php require_once 'config.php'?>
<?php
session_start();

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//pid should actually be uid but for some reason i kept getting an error with just a different variable name...
    $pid = $_POST['pid'];
	
	$stmt = $conn->prepare("SELECT UserID, FirstName, LastName
							FROM user
							WHERE UserID IN (SELECT UserId FROM request WHERE FriendID = '$pid')");
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
