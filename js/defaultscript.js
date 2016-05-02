    $(document).ready( function(){$('#loginlink').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-tab').removeClass('active');
		$('#login-tab').addClass('active');
	});
	$('#registerlink').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-tab').removeClass('active');
		$('#register-tab').addClass('active');
	}); });