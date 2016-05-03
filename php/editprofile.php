
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
    
	$pid = $_SESSION['ProfileID'];

		$stmt = $conn->prepare("UPDATE profile SET ProfileID = '$pid',Gender= '$gender',
													Age='$age',City='$city',State='$state',
													Occupation='$occupation',Interests='$interests' 
													WHERE ProfileID = '$pid'");
		$status = $stmt->execute();
		
		
		$_SESSION['gender'] = $gender;
		$_SESSION['age']= $age;
		$_SESSION['city']= $city;
		$_SESSION['state']= $state;
		$_SESSION['occupation']= $occupation;
		$_SESSION['interests']= $interests;
		
		header("Location: ../profileindex.html");
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
