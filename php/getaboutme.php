
<?php require_once 'config.php'?>
<?php
session_start();

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $uid = $_POST['uid'];
	$isHome = $_POST['isHome'];
	
	$stmt1 = $conn->prepare("SELECT FirstName, LastName FROM `user` WHERE UserID = $uid");
	$stmt1->execute();
	$row1 = $stmt1->fetch();
	
	$stmt = $conn->prepare("SELECT profile.ProfileID, Age, City, State, Gender, Interests, Occupation
		FROM `profile` INNER JOIN `userprofile` ON userprofile.UserID = $uid
		WHERE userprofile.ProfileID = profile.ProfileID;");
	$stmt->execute();
	$row= $stmt->fetch();
	
	
	if($isHome == false)
	{
		$stmt1 = $conn->prepare("SELECT FirstName, LastName FROM `user` WHERE UserID = $uid");
		$stmt1->execute();
		$row1 = $stmt1->fetch();
	}
	
	if($row)
    {
		$response = array(
			'gender'  => $row['Gender'],
			'age' => $row['Age'],
			'city' => $row['City'],
			'state' => $row['State'],
			'occupation' => $row['Occupation'],
			'interests' => $row['Interests'],
			'fname' => $row1['FirstName'],
			'lname' => $row1['LastName'],
		);
		
	}
	
	echo json_encode($response);
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
