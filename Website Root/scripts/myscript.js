
function registerValidator(){
	// Make quick references to our fields
	var regusername = document.getElementById("txtRegUsername");
	var name = document.getElementById("txtName");
	var email = document.getElementById("txtEmail");
	var regpassword = document.getElementById('txtRegPassword');
	var cpassword = document.getElementById('txtCpassword');
	
	// Check each input in the order that it appears in the form!
	if(notEmpty(regusername, "Please enter the Username")){
	if(lengthRestriction(regusername, 4, "Please enter at least 4 charactors for the Username")){
	if(notEmpty(name, "Please enter the Name")){
	if(isAlphabet(regusername, "Please enter only letters for the username")){
	if(emailValidator(email, "Enter a valid E-mail address")){
	if(notEmpty(regpassword, "Please enter the Password")){
	if(lengthRestriction(regpassword, 4, "Please enter at least 4 charactors for the Password")){
	if(confirmpw(regpassword, cpassword)){
	return true;
	}
	}
	}
	}
	}
	}
	}
	}
	
	return false;
	
}

function loginValidator(){
var username = document.getElementById("txtUsername");
var password = document.getElementById("txtPassword");

if(notEmpty(username, "Please enter the Username")){
if(notEmpty(password, "Please enter the Password")){
return true;
}
}

return false;
}

function createtopicValidator(){
var name = document.getElementById('txtName');
var text = document.getElementById('txtText');

if(notEmpty(name, "Please enter the Topic Name")){
if(notEmpty(text, "Please enter the Text")){
return true;
}
}


return false;
}

function postreplyValidator(){
var text = document.getElementById('txtText');

if(notEmpty(text, "Please enter the Text")){
return true;
}

return false;
}

function adddownloadValidator(){
	// Make quick references to our fields
	var dname = document.getElementById('txtDname');
	var url = document.getElementById('txtUrl');
	var artist = document.getElementById('txtArtist');
	var description = document.getElementById('txtDescription');
	
	// Check each input in the order that it appears in the form!
	if(notEmpty(dname, "Please enter the Download Name")){
	if(notEmpty(url, "Please enter the URL")){
	if(notEmpty(artist, "Please enter the Artist")){
	if(notEmpty(description, "Please enter the Description")){
	return true;
	}
	}
	}
	}
	return false;
}

function contactValidator(){
var name = document.getElementById('txtName');
var email = document.getElementById('txtEmail');
var message = document.getElementById('txtMessage');

if(notEmpty(name, "Please enter the Name")){
if(notEmpty(email, "Please enter the E-Mail")){
if(emailValidator(email, "Enter a valid E-mail address")){
if(notEmpty(message, "Please enter the Message")){
return true;
}
}
}
}

return false;
}

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, helperMsg){
	var uInput = elem.value;
	if(uInput.length >= min){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function confirmpw(elem1, elem2){
	if (elem1.value != elem2.value) { 
   		alert("Your password and confirmation password do not match.");
   		elem2.focus();
   		return false; 
	}else{
		return true;
	}
}