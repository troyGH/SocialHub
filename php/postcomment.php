<?php require_once 'config.php'?>
<?php
	session_start();

	$uid = $_SESSION["UserID"];
	//$fid = $_GET["id"];

	$commenttext = filter_var($_POST['commenttext'], FILTER_SANITIZE_STRING);

	try {
		$con = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query = "INSERT INTO comment(Comment) VALUES ('$commenttext')";
		$result = $con->query($query);

		$pid = $con->lastInsertId();


		$query = "INSERT INTO profilecomment(ProfileID, CommentID) VALUES ('$uid', '$pid')";
		$result = $con->query($query);

		//$query = "INSERT INTO senderrecievercomment(CommentID, SenderID, RecieverID) VALUES ('$pid', '$uid', '$fid')";
		//$result = $con->query($query);

	} catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
