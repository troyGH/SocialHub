<!DOCTYPE html>

<html>
<body>
	<?php
	session_start();
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "jeff1239210";
     
	$temp = $_SESSION["username"];
	echo $temp;

	try {
		$connectionstring = mysql_connect($servername,$dbusername,$dbpassword)
        	or die('Could not connect: ' . mysql_error());

        mysql_select_db('social_network')
        	or die('Could not select database: ' . mysql_error());

    
		
			$query = "SELECT USERID FROM user WHERE  Username = '$temp'"
        	$queryexe = mysql_query($query)
        		or die('Could not query database: ' . mysql_error());
             
        	while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
     				print "$col_value\n";
     			}
     			print "\n";
    		}
    		print "</table>\n";
		
        
	}
	catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
	}
	?>

	<br>
	<a href="Assignment3.html"> Back to Login Page </a>

</body>
</html>