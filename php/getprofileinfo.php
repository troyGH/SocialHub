
<?php require_once 'config.php'?>
<?php
session_start();

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	$uid = $_SESSION['UserID'];

	$stmt = $conn->prepare("SELECT profile.ProfileID, Age, City, State, Gender, Interests, Occupation
		FROM `profile` INNER JOIN `userprofile` ON userprofile.UserID = $uid
		WHERE userprofile.ProfileID = profile.ProfileID;");
	$stmt->execute();
	$row = $stmt->fetch();
	
	if($row)
    {
		$_SESSION['ProfileID'] = $row['ProfileID'];	
		$_SESSION['Gender'] = $row['Gender'];
		$_SESSION['Age']= $row['Age'];
		$_SESSION['City']= $row['City'];
		$_SESSION['State']=$row['State'];
		$_SESSION['Occupation']= $row['Occupation'];
		$_SESSION['Interests']= $row['Interests'];
	}
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
