<?php
session_start();
$response = array(
		'err' => isset($_SESSION['Error']) ? $_SESSION['Error'] : false,
		'auth' => isset($_SESSION['LoggedIn']) ? $_SESSION['LoggedIn'] : false,
		'uid' => isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '',
		'pid' => isset($_SESSION['ProfileID']) ? $_SESSION['ProfileID'] : '',
		'fname' => isset($_SESSION['FirstName']) ? $_SESSION['FirstName'] : '',
		'lname' => isset($_SESSION['LastName']) ? $_SESSION['LastName'] : ''
);

if(isset($_SESSION['Error']))
	$_SESSION['Error'] = false;

	echo json_encode($response);

 ?>