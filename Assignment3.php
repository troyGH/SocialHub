<!DOCTYPE html>
<html>
<body>
	<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "jeff1239210";

	$username =  isset($_POST['userName']) ? $_POST['userName'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$newusername = isset($_POST['createdUsername']) ? $_POST['createdUsername'] : '';
	$firstpassword = isset($_POST['firstPassword']) ? $_POST['firstPassword'] : '';
	$secondpassword = isset($_POST['secondPassword']) ? $_POST['secondPassword']: '';

	try {
		$connectionstring = mysql_connect($servername,$dbusername,$dbpassword)
        	or die('Could not connect: ' . mysql_error());

        mysql_select_db('social_network')
        	or die('Could not select database: ' . mysql_error());
        
        if(empty($username) && empty($password)) {
        	if ($firstpassword == $secondpassword) {
        		$insertNewUser = "INSERT INTO user (Email, Username, Password)
				 	VALUES ('$email', '$newusername', '$secondpassword')";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());
				echo "Successful creation of new user";
			} else {
				echo "Two passwords are not the same!";
			}
        }
        else {
        	$query = 'SELECT Username, Password FROM user';
        	$queryexe = mysql_query($query)
        		or die('Could not query database: ' . mysql_error());

        	while($row = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   			{
   				/*foreach ($row as $col_value) {
     				if ($col_value == $username) {
     					echo "Existing login.";
     				} else {
     					echo "No login by that username.";
     				}
     			}*/

     			if (($row["Username"] == $username) && ($row["Password"] == $password))
     				echo "Logged in.";
     			else
     				echo "Bad combination of username and password.";
    		}
        }

        
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>
	<br>
	<a href="Assignment3.html"> Back to Login Page </a>

</body>
</html>