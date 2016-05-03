<?php
session_start();
if($_SESSION['LoggedIn'] == true){
	$response = array(
		"auth" => $_SESSION['LoggedIn'],
		"uid" => $_SESSION['UserID'],
		"fname" => $_SESSION['FirstName'],
		"lname" => $_SESSION['LastName'],
		"gender" => $_SESSION['gender'],
		"age" => $_SESSION['age'],
		"city" => $_SESSION['city'],
		"state" => $_SESSION['state'],
		"occupation" => $_SESSION['occupation'],
		"interests" => $_SESSION['interests']
);
	echo json_encode($response);
}
 ?>