
<?php require_once 'config.php'?>
<?php
session_start();

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//pid should actually be uid but for some reason i kept getting an error with just a different variable name...
    $uid = $_POST['uid'];
	
	$stmt = $conn->prepare("SELECT Comment, FirstName, LastName, senderrecievercomment.SenderID 
							FROM comment, profilecomment, senderrecievercomment, user, userprofile 
							WHERE senderrecievercomment.RecieverID = $uid 
							AND profilecomment.ProfileID = userprofile.ProfileID 
							AND profilecomment.CommentID = comment.CommentID 
							AND senderrecievercomment.CommentID = comment.CommentID 
							AND senderrecievercomment.SenderID = user.UserID");
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
