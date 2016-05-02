<?php
session_start();
if($_SESSION['LoggedIn'] == true){
	session_destroy();
	session_unset();
	echo 'pass';
}
?>