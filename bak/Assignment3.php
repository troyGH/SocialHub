<!DOCTYPE html>

<html>
<body>
	<?php
	session_start();
	
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";

	$username =  isset($_POST['userName']) ? $_POST['userName'] : '';
	$_SESSION["username"] = $username;
	
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$_SESSION["passward"] = $password;
	
	$url =  isset($_POST['url']) ? $_POST['url'] : '';
	$first =  isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
	$_SESSION["first"] = $first;
	
	$last =  isset($_POST['LastName']) ? $_POST['LastName'] : '';
	$_SESSION["last"] = $last;
	
	$city =  isset($_POST['City']) ? $_POST['City'] : '';
	$state =  isset($_POST['State']) ? $_POST['State'] : '';
	$age =  filter_input(INPUT_POST, "ages");
	$occupation =  filter_input(INPUT_POST, "Occupation");
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$newusername = isset($_POST['createdUsername']) ? $_POST['createdUsername'] : '';
	$firstpassword = isset($_POST['firstPassword']) ? $_POST['firstPassword'] : '';
	$secondpassword = isset($_POST['secondPassword']) ? $_POST['secondPassword']: '';
	
	

	try {
		$connectionstring = mysql_connect($servername,$dbusername,$dbpassword)
        	or die('Could not connect: ' . mysql_error());

        mysql_select_db('social network')
        	or die('Could not select database: ' . mysql_error());
        //create new user
        if(empty($username) && empty($password)) {
        	if ($firstpassword == $secondpassword) {
				//insert into user table
        		$insertNewUser = "INSERT INTO user (Email, Username, Password)
				 	VALUES ('$email', '$newusername', '$secondpassword')";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());
				//insert into profile table	
				$insertNewUser = "INSERT INTO profile (URL, FirstName, LastName, Age, City, State, Occupation)
				 	VALUES ('$url', '$first', '$last', '$age', '$city', '$state', '$occupation')";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());	
				//insert into userprofile table	
				$insertNewUser = "INSERT INTO userprofile (UserID, ProfileID) SELECT user.UserID, profile.ProfileID 
				FROM user, profile WHERE user.Username = '$newusername' AND profile.FirstName = '$first'";
				$results = mysql_query($insertNewUser)
        			or die('could not insert into database: ' . mysql_error());		
				echo "Successful creation of new user";
				
			} else {
				echo "Two passwords are not the same!";
			}
        }
        else{
        	$query = "SELECT Username FROM user WHERE user.Password = '$password'";
        	$queryexe = mysql_query($query)
        		or die('Could not query database: ' . mysql_error());
             
        	while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
   
					if ($col_value == $username) {
     					//jump to login_page
						header("Location: login_page.html");
						
     				} 
     			}
			    echo "wrong UserName or Password";
     			print "\n";
    		}
			
    		print "</table>\n";
			 echo "wrong UserName or Password";
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
