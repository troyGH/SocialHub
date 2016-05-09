
<?php require_once 'config.php'?>
<?php
session_start();

$gender =  $_POST['gender'];
$age = filter_var($_POST['inputAge'], FILTER_SANITIZE_NUMBER_INT);
$city = filter_var($_POST['inputCity'], FILTER_SANITIZE_STRING);
$state = filter_var($_POST['inputState'], FILTER_SANITIZE_STRING);
$occupation = filter_var($_POST['inputOccupation'], FILTER_SANITIZE_STRING);
$interests = filter_var($_POST['inputInterests'], FILTER_SANITIZE_STRING);

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$uid = $_SESSION['UserID'];
	
    $result = $conn->prepare("SELECT ProfileID FROM `userprofile` WHERE userprofile.UserID = $uid");
	$result->execute();
	$pid = $result->fetch();

	$stmt = $conn->prepare("UPDATE profile 
							SET Gender = IF('$gender' = '', Gender, '$gender'),
								Age = IF('$age' = '', Age, '$age'),
								City = IF('$city' = '', City, '$city'),
								State = IF('$state' = '', State, '$state'),
								Occupation = IF('$occupation' = '', Occupation, '$occupation'),
								Interests = IF('$interests' = '', Interests, '$interests')
							WHERE ProfileID = ".$pid['ProfileID']);
						
	$stmt->execute();
		
		
	header("Location: ../profilesettings.html");
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
