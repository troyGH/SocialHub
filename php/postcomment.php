<?php require_once 'config.php'?>
<?php
	session_start();

	$uid = $_SESSION["UserID"];
	$fid = $_POST["friendId"];
	$commenttext = $_POST['commenttext'];

	try {
		$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$stmt = $conn->prepare("INSERT INTO comment (Comment) VALUES ('$commenttext');");
		$stmt->execute();

		$cid = $conn->lastInsertId();
		
		$stmt = $conn->prepare("INSERT INTO `senderrecievercomment`(`CommentID`, `SenderID`, `RecieverID`) 
								VALUES ($cid,$uid,$fid)");
		$stmt->execute();
		
		$result = $conn->prepare("SELECT ProfileID FROM `userprofile` WHERE userprofile.UserID = $fid");
		$result->execute();
		$pid = $result->fetch();
		
		$stmt = $conn->prepare("INSERT INTO profilecomment (`ProfileID`, `CommentID`) VALUES (".$pid['ProfileID'].", $cid)");
		$stmt->execute();
		
		header("Location: ../profile.php?id=$fid");

	} catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
