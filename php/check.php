<?php
session_start();
if($_SESSION['LoggedIn'] == true){
	$response = array(
		"auth" => $_SESSION['LoggedIn'],
		"uid" => $_SESSION['UserID'],
		"fname" => $_SESSION['FirstName'],
		"lname" => $_SESSION['LastName']
);
	echo json_encode($response);
}
 ?>