function randomPassword() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomPassword = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomPassword += chars.substring(rnum,rnum+1);
	}
	document.createUser.Password.value = randomPassword;
}

function randomPassword2() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomPassword = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomPassword += chars.substring(rnum,rnum+1);
	}
	document.UserLoginEdit.Password.value = randomPassword;
}

