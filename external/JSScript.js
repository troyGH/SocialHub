function SignUpValidate() {
        	return (verifyNull() && passValidate());
}

function verifyNull() {
	var isValid = true;
	var errors = ""
	if (!document.getElementById("username").value.trim().length) {
		isValid = false;
		errors += "Username must be filled out.\n";
	}

	if (!document.getElementById("pass1").value.trim().length) {
		isValid = false;
		errors += "Password must be filled out.\n";
	}

	var emailRE = /^.+@.+\..{2,4}$/;
	if (!document.getElementById("email").value.trim().length) {
		isValid = false;
		errors += "Email must be filled out.\n";
	}
	else if (!emailRE.test(document.getElementById("email").value)) {
		isValid = false;	
		errors += "Invalid email address.\n";
	}

	var urlRE = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
	if (!document.getElementById("URL").value.trim().length) {
		isValid = false;
		errors += "URL must be filled out.\n";
	} else if (!urlRE.test(document.getElementById("URL").value)) {
		isValid = false;
		errors += "Invalid URL.\n";
	}
	
	
	if (!document.getElementById("first").value.trim().length) {
		isValid = false;
		errors += "First name must be filled out.\n"
	}

	if (!document.getElementById("last").value.trim().length) {
		isValid = false;
		errors += "Last name must be filled out.\n"
	}

	if (!document.getElementById("city").value.trim().length) {
		isValid = false;
		errors += "City must be filled out.\n"
	}

	if (!document.getElementById("URL").value.trim().length) {
		isValid = false;
		errors += "URL must be filled out.\n"
	}

	if (!document.getElementById("state").value.trim().length) {
		isValid = false;
		errors += "State must be filled out.\n"
	}

	if (errors != "") {
		alert(errors);
		return isValid;
	}

}

function checkPass()
		{
			var pass1 = document.getElementById('pass1');
			var pass2 = document.getElementById('pass2');
			var message = document.getElementById('checkingMessage');
			//Set the colors we will be using ...
			var goodColor = "#66cc66";
			var badColor = "#ff6666";
			//Compare the values in the password field 
			//and the confirmation field
			if(pass1.value == pass2.value){
				//The passwords match. 
				//Set the color to the good color and inform
				//the user that they have entered the correct password 
				pass2.style.backgroundColor = goodColor;
				message.style.color = goodColor;
				message.innerHTML = "Passwords Match!"
			}else{
				//The passwords do not match.
				//Set the color to the bad color and
				//notify the user.
				pass2.style.backgroundColor = badColor;
				message.style.color = badColor;
				message.innerHTML = "Passwords Do Not Match!"
			}
		}

function passValidate() {
	var pass1 = document.getElementById('pass1');
	var pass2 = document.getElementById('pass2');
	var isValid = true;

	if (pass1.value != pass2.value) {
		alert("Passwords do not match!");
		isValid = false;
	}

	return isValid;
}

function Loginvalidate(){   
            var name  = document.forms["loginForm"]["userName"].value;  
            if(name == "" || name == null){
			
				alert("UserName must be filled out");
				return false;
			
			}
}

function productValidate() {
	var isValid = true;

	if (!document.getElementById("title").value.trim().length) {
		alert("Product title must be filled out.");
		isValid = false;
	}

	return isValid;

}

window.onload = function(){
	var context = document.getElementById('myCanvas').getContext('2d');
	  //shadow
	  context.shadowColor = 'gray';
	  context.shadowBlur = 5;
	  context.shadowOffsetX = -2;
      context.shadowOffsetY = -2;
	  context.fill();

	  //First letter of each word
      context.font = 'bold 50px Arial';
	  context.fillStyle = "blue";
      context.fillText('S', 0, 45);
	  context.fillText('H', 30, 90);

	  //gold letters
	  context.font = 'bold 25px Arial';
	  context.fillStyle = "gold";
	  context.fillText('ocial', 35, 45);
	  context.fillStyle = "gold";
	  context.fillText('ub', 65, 90);
}
	
