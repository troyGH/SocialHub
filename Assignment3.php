<!DOCTYPE html>
<html>
<body>
	<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "jeff1239210";

	$username = $_POST['userName'];
	$password = $_POST['password'];
	$newusername = isset($_POST['createdUsername']) ? $_POST['createdUsername'] : '';
	$firstpassword = isset($_POST['firstPassword']) ? $_POST['firstPassword'] : '';
	$secondpassword = isset($_POST['secondPassword']) ? $_POST['secondPassword']: '';

	try {
		$connectionstring = mysql_connect($servername,$dbusername,$dbpassword)
        	or die('Could not connect: ' . mysql_error());

        mysql_select_db('social_network')
        	or die('Could not select database: ' . mysql_error());
        
        if ($firstpassword == $secondpassword) {
        	$insertNewUser = "INSERT INTO user (Username, Password)
			 	VALUES ('$newusername', '$secondpassword')";
			$results = mysql_query($insertNewUser)
        		or die('could not insert into database: ' . mysql_error());
			echo "Successful creation of new user";
		} else {
			echo "Two passwords are not the same!";
		}
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}

	?>

</body>
</html>