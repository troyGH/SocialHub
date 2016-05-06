<?php require_once 'config.php'?>
<?php
session_start();

//check if the users is already logged in
if($_SESSION['UserID'] == true){
    echo 'User is already logged in';
	exit;
}

$email =  filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL);
$password = filter_var($_POST['inputPassword'], FILTER_SANITIZE_STRING);

try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM user WHERE user.Password = '$password' AND user.Email = '$email'");
    $stmt->execute();
    $row = $stmt->fetch();
    
    if(!$row)
    {
		$_SESSION['Error'] = true;
        header("Location: ../index.html");
    }
    else
    {
        $_SESSION['LoggedIn'] = true;
        $_SESSION['UserID'] = $row['UserID'];
		$_SESSION['FirstName'] =  $row['FirstName'];
		$_SESSION['LastName'] =  $row['LastName'];
        header("Location: ../profileindex.html");

    }
}
	
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>