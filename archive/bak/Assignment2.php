<!DOCTYPE html>
<html>
<body>


	<p>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "jeff1239210";

		$first = $_POST['FirstName'];
		$last = $_POST['LastName'];
		$sex = $_POST['Sex'];
		$school = $_POST['School'];
		$age = $_POST['Age'];

		try {
			
			$connectionstring = mysql_connect($servername,$username,$password)
        	or die('Could not connect: ' . mysql_error());

        	mysql_select_db('cs174')
        	or die('Could not select database: ' . mysql_error());

			$Insert = "INSERT INTO assignment1 (FirstName, LastName, Sex, School, Age)
			 VALUES ('$first','$last', '$sex', '$school','$age' )";

            //$PostInsert = "INSERT INTO posts (PostText) VALUES ('$post')";

			$results = mysql_query($Insert)
        	or die('could not insert into database: ' . mysql_error());

        	$Query = 'SELECT FirstName, LastName, Sex, School, Age FROM assignment1';
			$Sjsu = 'SELECT * FROM assignment1 WHERE School = "San Jose State University"';
			$Female = 'SELECT * FROM assignment1 WHERE Sex = "Female"';
			$Age21 = 'SELECT * FROM assignment1 WHERE Age > 21';

			$queryexe = mysql_query($Query)
        	or die('Could not query database: ' . mysql_error());
        	$querysjsu = mysql_query($Sjsu)
        	or die('Could not query database: ' . mysql_error());
        	$queryfemale = mysql_query($Female)
        	or die('Could not query database: ' . mysql_error());
        	$queryage = mysql_query($Age21)
        	or die('Could not query database: ' . mysql_error());

        	// query prints people who attend SJSU
        	print "<table border='1'> \n";
        	print "Which student attends San Jose State University? \n";
        	print "<tr>\n";
        	print "\t<td>First Name</td>\n";
        	print "\t<td>Last Name</td>\n";
        	print "\t<td>Sex</td>\n";
        	print "\t<td>School</td>\n";
        	print "\t<td>Age</td>\n";
            print "\t<td>Post</td>\n";
        	while($dataArray = mysql_fetch_array($querysjsu, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
     				print "\t<td>$col_value</td>\n";
     			}
     			print "</tr>\n";
    		}
    		print "</table>\n";

    		// query prints those who are female
    		print "\n<table border='1'> \n";
        	print "Which students are female? \n";
        	print "<tr>\n";
        	print "\t<td>First Name</td>\n";
        	print "\t<td>Last Name</td>\n";
        	print "\t<td>Sex</td>\n";
        	print "\t<td>School</td>\n";
        	print "\t<td>Age</td>\n";
        	while($dataArray = mysql_fetch_array($queryfemale, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
     				print "\t<td>$col_value</td>\n";
     			}
     			print "</tr>\n";
    		}
    		print "</table>\n";

    		// query prints those who are older than 21
    		print "\n<table border='1'> \n";
        	print "Which students are older than 21? \n";
        	print "<tr>\n";
        	print "\t<td>First Name</td>\n";
        	print "\t<td>Last Name</td>\n";
        	print "\t<td>Sex</td>\n";
        	print "\t<td>School</td>\n";
        	print "\t<td>Age</td>\n";
        	while($dataArray = mysql_fetch_array($queryage, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
     				print "\t<td>$col_value</td>\n";
     			}
     			print "</tr>\n";
    		}
    		print "</table>\n";

    		// all students
    		print "\n<table border='1'> \n";
        	print "Full Student List \n";
        	print "<tr>\n";
        	print "\t<td>First Name</td>\n";
        	print "\t<td>Last Name</td>\n";
        	print "\t<td>Sex</td>\n";
        	print "\t<td>School</td>\n";
        	print "\t<td>Age</td>\n";
        	while($dataArray = mysql_fetch_array($queryexe, MYSQL_ASSOC))
   			{
     			print "<tr>\n";
     			foreach ($dataArray as $col_value) {
     				print "\t<td>$col_value</td>\n";
     			}
     			print "</tr>\n";
    		}
    		print "</table>\n";

		}
		catch(PDOException $ex) {
			echo 'ERROR: ' . $ex->getMessage();
		}
		
		?>
	</p>
</body>
</html>