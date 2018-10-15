function logIn() {
	$('#email_error').html('');
	$('#pass_error').html('');
    var username = $("#username").val();
	var url= "../control/login.php";
	if (username == '') {
        $('#email_error').html('username feild is empty.');
        return false;
    }else{
		var dataStr="username="+username;
		var status = returnAjax('POST', url, dataStr);
		if (status != 1) {
        	$('#email_error').html('username not found.');
        	return false;
       	}
	}
    var password = $("#password").val();
	if (password == '') {
        $('#pass_error').html('password feild is empty.');
        return false;
    }else{
		var dataStr="username="+username+"&password="+password;
		var status = returnAjax('POST', url, dataStr);
		if (status != 1) {
        	$('#pass_error').html('password not valid.');
        	return false;
       	}
	}
		var remember = "";
        if ($('input[name=logedIn]').is(':checked') == true) {
            remember = '1';
            $('#logedIn').val('1');
        } else {
            remember = '0';
            $('#logedIn').val('0');
        }
return true;
}

function frgtPswd_click() {
    $("#login").hide();
    $("#forgotPass").fadeIn(1000);
}

function forgotEmailAvail(type) {
    var email = $("#email").val();
    var url = '';
    if (type == 0) {
        url = 'control/chkEmail.php';
    } else {
        url = '../control/chkEmail.php';
    }

    $.post(url, {
        email_value: email
    }, function (data) {
        if (data == 0) {
            showError('0', 'E-mail address already exists');
            return false;
        }
    });
    showError('0', '');
    return true;

}

function forgot() {

}