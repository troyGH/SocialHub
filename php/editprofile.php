
<?php require_once 'config.php'?>
<?php
session_start();

$gender =  $_POST['inputEmail'];
$age = filter_var($_POST['inputAge'], FILTER_SANITIZE_NUMBER_INT);
$city = filter_var($_POST['inputCity'], FILTER_SANITIZE_STRING);
$state = filter_var($_POST['inputState'], FILTER_SANITIZE_STRING);
$occupation = filter_var($_POST['inputOccupation'], FILTER_SANITIZE_STRING);
$interests = filter_var($_POST['inputInterests'], FILTER_SANITIZE_STRING);

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	//not ready
   // $stmt = $conn->prepare("UPDATE `profile` SET `Gender`=[value-2],`Age`=[value-3],`City`=[value-4],`State`=[value-5],`Occupation`=[value-6],`Interests`=[value-7] WHERE 1");
    //$status = $stmt->execute();
    
    if($status){
	}
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
