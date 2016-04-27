
<?php require_once 'config.php'?>
<?php
session_start();

//check if the users is already logged in
if(isset( $_SESSION['Email'] ))
    $message = 'Users is already logged in';


$email =  filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL);
$password = filter_var($_POST['inputPassword'], FILTER_SANITIZE_STRING);

try{
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM user WHERE user.Password = '$password' AND user.Email = '$email'");
    $stmt->execute();
    $row = $stmt->fetch();
    echo $row['UserID'];
    
    if(!$row)
    {
        header("location: ../login.html");
        session_unset();
        session_destroy();
    }
    else
    {
        $_SESSION['Email'] = $email;
        header("location: ../profileindex.html");

    }
}
	
catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}
?>