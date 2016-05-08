<?php require_once 'config.php'?>
<?php
	session_start();

	$uid = $_SESSION["UserID"];
	//$fid = $_GET["id"];

	$commenttext = filter_var($_POST['commenttext'], FILTER_SANITIZE_STRING);

	try {
		$con = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query = "INSERT INTO comment(Comment) VALUES ('$commenttext')";
		$result = $con->query($query);

		$pid = $con->lastInsertId();

		$query = "INSERT INTO profilecomment(ProfileID, CommentID) VALUES ('$uid', '$pid')";
		$result = $con->query($query);

		//$query = "INSERT INTO senderrecievercomment(CommentID, SenderID, RecieverID) VALUES ('$pid', '$uid', '$fid')";
		//$result = $con->query($query);

	} catch(PDOException $ex) {
    echo 'ERROR: ' . $ex->getMessage();
}

/* STUFF FROM PROFILE.PHP
function newComment(id){
			var commentText = $('#commentbox').val();
			if(!$.trim(commentText)) {
				alert("Pleae enter a comment first!");
				return;
			}
			else{
			$.ajax({
				url: 'php/postcomment.php',
				type: 'POST',
				data: {uid: id, comment: commentbox},
				datatype: 'html',
				success: function(data) {
					var list = JSON.parse(data);
					list.forEach(function(i) {
					updateComments(i);
				});
				}
			})
		}

		<div class="form-group text-right">
							  <textarea class="form-control" rows="5" id="commentbox"></textarea>
						</div>
						
						<div class="form-group last">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="button" onclick="return newComment(<?php echo $_GET['id']; ?>)" class="btn btn-primary btn-sm">Post Comment</button>
								<button type="reset" class="btn btn-default btn-sm">Reset</button>
							</div>
						</div>
						*/
?>