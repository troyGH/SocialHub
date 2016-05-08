
<?php require_once 'config.php'?>
<?php
session_start();

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $pid = $_POST['pid'];
	
	$stmt = $conn->prepare("SELECT Comment FROM comment, profilecomment WHERE profilecomment.ProfileID = $pid AND profilecomment.CommentID = comment.CommentID");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	if($result)
    {
		$arr = array();
		
		foreach($result as $item){
			array_push($arr, $item['Comment']);
		}
		echo json_encode($arr);
	}
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
