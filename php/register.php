
<?php require_once 'config.php'?>
<?php
session_start();

		$email =  filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL);  
		$password = filter_var($_POST['inputPassword'], FILTER_SANITIZE_STRING);
		$fname = filter_var($_POST['inputFname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['inputLname'], FILTER_SANITIZE_STRING);

try{
		
		$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("INSERT INTO `user`(`Email`, `Password`, `FirstName`,`LastName`) VALUES ('$email','$password', '$fname','$lname');");
		$status = $stmt->execute();
    
		if($status){
			$uid = $conn->lastInsertId();
			
		 
			$stmt = $conn->prepare("INSERT INTO `profile`(`Gender`, `Age`, `City`, `State`, `Occupation`, `Interests`) VALUES ('Other',0,'','','','');");
			$stmt->execute();
		 
			$pid = $conn->lastInsertId();
			
		 
			$stmt = $conn->prepare("SET FOREIGN_KEY_CHECKS=0;INSERT INTO `userprofile`(`UserID`, `ProfileID`) VALUES ($uid,$pid);"); 
			$stmt->execute();
		 
		 
			$_SESSION['LoggedIn'] = true;
			$_SESSION['UserID'] = $uid;
			$_SESSION['ProfileID'] = $pid;
			$_SESSION['FirstName'] = $fname;
			$_SESSION['LastName'] = $lname;
		 
		 
			header("Location: ../profilesettings.html");
		}
		
	
}
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>
