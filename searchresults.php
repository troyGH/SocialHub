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
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-theme.css">
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../css/default.css">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/defaultscript.js"></script>

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

   function getFriends(id){
		$.post("php/getfriends.php",{uid: id},
		function(data){
			var list = JSON.parse(data);
			list.forEach(function(i) {
				updateFriends(i);
			});
		});
	}		
	
	function updateFriends(friend){
		var a = $('<a />');
		$('#FriendList').append('<p>');
		a.attr('href', "profile.php?id="+ friend.FriendsID);
		a.text(friend.FirstName + " " + friend.LastName);
		$('#FriendList').append(a);
		$('#FriendList').append('</p>');
	}	

	
	window.onload = function(){
		var name = <?php echo $_GET['name'] ; ?> ;
		getSearchResults(name);
		
	};//window.onload 
	
    </script>
</head>
<body>
    <!-- navbar-->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html" >SocialHub</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profileindex.html"><span class="glyphicon glyphicon-home"></span></a></li>
            <li><a href="aboutus.html">About</a></li>
            <li><a href="news.html">News</a></li>
            <li><a href="contact.html">Contact</a></li>
              
            <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>      
                <ul class="dropdown-menu">
                  <li><a href="profileindex.html">Profile</a></li>
                  <li><a href="profilesettings.html">Edit Profile</a></li>
                  <li class="active"><a href="#">Friends</a></li> 
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
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	  
	<div class="container text-center">    
	  <div class="row">
		<div class="col-md-12 " id="signin-form-index">
		   <div class="panel panel-default">  
			<div class="panel-heading">
						<ul class="nav nav-pills nav-justified">
							<li class="active" id="FriendList-tab"><a href="#" id="ListLink">Friend List</a></li>
							<li id="FriendRequest-tab"><a href="#" id="Requestlink">Friend Request</a></li>
						</ul>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="FriendList-form" role="form" method="POST" action="#" style="display: block;">
							<center>
							<div class = "col-sm-12" id="FriendList">
							</div>
							</center>
					
				
				</form>
			
				<form class="form-horizontal" id="FriendRequest-form" role="form" method="POST" action="#" style="display: none;">
							<center>
							<div class = "col-sm-12" id="RequestList"></div>
							</center>
						
							
							<div class="form-group">
					
							</div>
				</form>
				
			</div>
		   </div>
		</div>
	  </div>
	</div>
	
	<!-- tabbed forms script -->
	<script>
    $(document).ready( function(){$('#ListLink').click(function(e) {
		$("#FriendList-form").delay(100).fadeIn(100);
 		$("#FriendRequest-form").fadeOut(100);
		$('#FriendRequest-tab').removeClass('active');
		$('#FriendList-tab').addClass('active');
	});
	$('#Requestlink').click(function(e) {
		$("#FriendRequest-form").delay(100).fadeIn(100);
 		$("#FriendList-form").fadeOut(100);
		$('#FriendList-tab').removeClass('active');
		$('#FriendRequest-tab').addClass('active');
	});	});
	</script>
	
	<footer class="container-fluid text-center">
	  <p><p>&copy; SJSU CS174 Spring 2016 Project. All rights reserved.</p>
	</footer>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
</body>
</html>