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
	var uid = <?php echo $_GET['id']; ?>;
	
	function getFriends(id){
		$.post("php/getfriends.php",{uid: id},
		function(data){
			var list = JSON.parse(data);
			list.forEach(function(i) {
				updateFriends(i);
			});
		});
	}		
	
	function updateFriends(link){
		var a = $('<a />');
		$('#friends-list').append('<p>');
		a.attr('href', "profile.php?id="+link);
		a.text("Friend");
		$('#friends-list').append(a);
		$('#friends-list').append('</p>');
	}
	
    function getAboutMe(id){ 
		$.post("php/getaboutme.php", {uid: id, isHome: false},
		function(data){
			var list = JSON.parse(data);
			updateAboutMe(list);
		});
	}
		
	function updateAboutMe(data){
		$('#gender').html(" " + data.gender);
		$('#age').html(" " + data.age);
		$('#city').html(" " + data.city);
		$('#state').html(" " + data.state);
		$('#occupation').html(" " + data.occupation);
		$('#interests').html(" " + data.interests);	
		$('#username').html(data.fname + " " + data.lname);
	}
		
	window.onload = function(){
		var uid = <?php echo $_GET['id']; ?>;
		getFriends(uid);
		getAboutMe(uid);
	};
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
              
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>      
                <ul class="dropdown-menu">
                  <li><a href="profileindex.html">Profile</a></li>
                  <li><a href="profilesettings.html">Edit Profile</a></li>
                  <li><a href="friends.html">Friends</a></li> 
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
		<div class="col-sm-3 well">
		  <div class="well">
			<h2 id="username">First Last</h2>
			<hr>
			<img src="https://pbs.twimg.com/profile_images/1237550450/mstom_400x400.jpg" class="img-circle" height="65" width="65" alt="Avatar">
		  </div>
		  <div class="well text-left">
			<h2 class="text-center">About Me</h2>
			<hr>
			  <label>Gender: </label><span id="gender"></span></br>
			  <label>Age: </label><span id="age"></span></br>
			  <label>City: </label><span id="city"></span></br>
			  <label>State: </label><span id="state"></span></br>
			  <label>Occupation: </label><span id="occupation"></span></br>
			  <label>Interests: </label><span id="interests"></span>
		  </div>
		</div>
		
		<div class="col-sm-7">
		  <div class="row">
			<div class="col-sm-12">
			  <div class="panel panel-default text-left">
				<div class="panel-body">
				  <h3 class="text-center">Comments</h3>
				  <hr>
				<!--  
				  <div class="row">
			<div class="col-sm-3">
			  <div class="well text-center">
			   <p><a href="#">Friend 4</a></p>
			  </div>
			</div>
			<div class="col-sm-9">
			  <div class="well">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum varius erat id scelerisque. 
				Quisque massa leo, volutpat eget dolor vel, lobortis condimentum est. Suspendisse quis risus at enim commodo viverra. 
				Maecenas aliquet ultricies luctus. Maecenas et leo ut odio pretium varius in ut ligula. Sed sit amet consectetur nisl. 
				Mauris interdum pharetra scelerisque. Praesent libero est, fringilla porttitor cursus elementum, sodales at felis. 
				Nullam efficitur sed purus et sodales.</p>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-sm-3">
			  <div class="well text-center">
			   <p><a href="#">Friend 3</a></p>
			  </div>
			</div>
			<div class="col-sm-9">
			  <div class="well">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum varius erat id scelerisque. 
				Quisque massa leo, volutpat eget dolor vel, lobortis condimentum est. Suspendisse quis risus at enim commodo viverra. 
				Maecenas aliquet ultricies luctus. Maecenas et leo ut odio pretium varius in ut ligula. Sed sit amet consectetur nisl. 
				Mauris interdum pharetra scelerisque. Praesent libero est, fringilla porttitor cursus elementum, sodales at felis. 
				Nullam efficitur sed purus et sodales.</p>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-sm-3">
			  <div class="well text-center">
			   <p><a href="#">Friend 2</a></p>
			  </div>
			</div>
			<div class="col-sm-9">
			  <div class="well">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum varius erat id scelerisque. 
				Quisque massa leo, volutpat eget dolor vel, lobortis condimentum est. Suspendisse quis risus at enim commodo viverra. 
				Maecenas aliquet ultricies luctus. Maecenas et leo ut odio pretium varius in ut ligula. Sed sit amet consectetur nisl. 
				Mauris interdum pharetra scelerisque. Praesent libero est, fringilla porttitor cursus elementum, sodales at felis. 
				Nullam efficitur sed purus et sodales.</p>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-sm-3">
			  <div class="well text-center">
			   <p><a href="#">Friend 1</a></p>
			  </div>
			</div>
			<div class="col-sm-9">
			  <div class="well">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum varius erat id scelerisque. </p>
			  </div>
			</div>
		  </div> 
-->		  
		</div>
				   
				</div>
			  </div>
			</div>
		  </div>
		  
		  
			<div class="col-sm-2 well">
				<h3>Friends</h3>
				<hr> 
				<div class="well" id="friends-list">
			<!--	<p><a href="#">Friend 1</a></p> -->
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