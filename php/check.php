<?php
session_start();
$response = array(
		'err' => isset($_SESSION['Error']) ? $_SESSION['Error'] : false,
		'auth' => isset($_SESSION['LoggedIn']) ? $_SESSION['LoggedIn'] : false,
		'uid' => isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '',
		'pid' => isset($_SESSION['ProfileID']) ? $_SESSION['ProfileID'] : '',
		'fname' => isset($_SESSION['FirstName']) ? $_SESSION['FirstName'] : '',
		'lname' => isset($_SESSION['LastName']) ? $_SESSION['LastName'] : '',
		'gender' => isset($_SESSION['Gender']) ? $_SESSION['Gender'] : 'other',
		'age' => isset($_SESSION['Age']) ? $_SESSION['Age'] : 0,
		'city' => isset($_SESSION['City']) ? $_SESSION['City'] : '',
		'state' => isset($_SESSION['State']) ? $_SESSION['State'] : '',
		'occupation' => isset($_SESSION['Occupation']) ? $_SESSION['Occupation'] : '',
		'interests' => isset($_SESSION['Interests']) ? $_SESSION['Interests'] : ''
);

if(isset($_SESSION['Error']))
	$_SESSION['Error'] = false;

	echo json_encode($response);

 ?>