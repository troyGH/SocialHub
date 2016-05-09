<!DOCTYPE html>
<html lang="en">
<META NAME="Author" CONTENT="Troy Nguyen, Vinay Ponnaganti, Aiden Nguyen, Yu-Kai Huang">
<META NAME="Date" CONTENT="April 24, 2016">
<META NAME="Copyright" CONTENT="SJSU CS174 Spring 2016 Project. All rights reserved.">
<META NAME="Robots" CONTENT="all">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<head>

<title>SocialHub</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<!-- Local CSS Files -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/default.css">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/defaultscript.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
    <script>

    function getSearchResults(n){
		$.post("php/getresults.php",{name: n},
		function(data){
			var list = JSON.parse(data);
			list.forEach(function(i) {
				updateResults(i);
			});
		});
	}

	function updateResults(friend){
		var a = $('<a />');
		$('#FriendList').append('<p>');
		a.attr('href', "profile.php?id="+ friend.UserID);
		a.text(friend.FirstName + " " + friend.LastName);
		$('#FriendList').append(a);
		$('#FriendList').append('</p>');
	}
	function isLoggedIn(){
		$.ajax({
			url: 'php/check.php',
			success: function (response) {
			var data = JSON.parse(response);
			if(data.auth == false)
				$('#dropdownmenu').remove();
			else
				updateNotifications(data.uid);	
			}	
		});	
	}
	function updateNotifications(id){
		var count = 0;
		$.post("php/getRequest.php",{pid: id},
			function(data){
				var list = JSON.parse(data);
				
				list.forEach(function(i) {
					count++;
				});
				
				if(list){
					$('#requests-indicator').text(count);
					$('#dropdown-indicator').text(count);
				}
				else{
					$('#requests-indicator').hide();
					$('#dropdown-indicator').hide();
				}
			});
	}	
	function checksearch(){
		var Text = document.getElementById('search').value;

		if(!$.trim(Text)) 
		{
			return false;
		}
		else{
			window.location.replace ("/searchresults.php?name=" +'\''+Text+'\'');
		}		
	}
	
	window.onload = function(){
		var name = <?php echo $_GET['name'] ; ?> ;
		getSearchResults(name);
		isLoggedIn();
		
	};//window.onload 
	
    </script>
</head>
<body>
    <!-- navbar-->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header col-md-7">
            <a class="navbar-brand" href="index.html" >SocialHub</a>
     
     	 <!--<form class="navbar-form" role="search" method="POST" action="searchresults.php" onsubmit="location.href='/searchresults.php?name=' + '\'' + document.getElementById('search').value + '\'';"> -->	
        	<div class="input-group">
			<input type="text" class="search-query form-control" id="search" placeholder="Search" style="margin-top:7px;"/>
			<span class="input-group-btn">
				<button class="btn btn-default" onclick="return checksearch()" style="margin-top:7px;">
					<span class="glyphicon glyphicon-search">
						<span class="sr-only">Search</span>
					</span>
				</button>
			</span>
			</div>
		<!-- </form> -->
		</div>
		
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-5">
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="aboutus.html">About</a></li>
            <li><a href="news.html">News</a></li>
            <li><a href="contact.html">Contact</a></li>
              
            <li class="dropdown" id="dropdownmenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span id="requests-indicator" class="badge badge-notify" style="color:white; background-color: red;"></span>
                    <span class="glyphicon glyphicon-user"></span>
					<span class="caret"></span></a>      
                <ul class="dropdown-menu">
                  <li><a href="profileindex.html">Profile</a></li>
                  <li><a href="profilesettings.html">Edit Profile</a></li>
                  <li><a href="friends.html"><span id="dropdown-indicator" class="badge badge-notify" style="color:white; background-color: red;"></span>Friends</a></li> 
                  <li class="divider"></li>
                  <li><a href="#" id="logout">Sign Out</a></li> 
                    <script>
                     $("#logout").click(function() {
            $.ajax({
				url: 'php/signout.php',
				success: function (response) {
				if(response == 'pass')
					window.location.href = 'index.html';
        }
    });
        });
				</script>
                </ul>
              </li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
    </div>
   
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	<div class="container">

	  <div class="panel panel-primary text-center">
			<div class="panel-heading">
				<h4> Results </h4> 
			</div>
		<div class="panel-body">
		<div class = "col-sm-12" id="FriendList">
			</div>
		</div>
	</div>  
</div>
	<footer class="container-fluid text-center">
	  <p><p>&copy; SJSU CS174 Spring 2016 Project. All rights reserved.</p>
	</footer>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>