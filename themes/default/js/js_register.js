function actionRegister(btregister, diverror, divcurrent, divok)
{
	$(btregister).attr('disabled','true');

	email = $.trim($('#email').val());
	if (!emailvalidate(email)) {
		openandclose(diverror,rtxterror1,1700);
		$('#email').focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	emailRE = /^[a-zA-Z0-9._+-]+@cu.edu.ge$/
  if (!emailRE.exec(email)){
		openandclose(diverror,rtxterror7,1700);
		$('#email').focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	passwordr=$('#passwordr').val();
	if (passwordr == '') {
		openandclose(diverror,rtxterror3,1700);
		$('#passwordr').focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	if (passwordr.length < 6 || passwordr.length > 15) {
		openandclose(diverror,rtxterror4,1700);
		$(passwordr).focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	repassword=$('#repassword').val();
	if (repassword != passwordr) {
		openandclose(diverror,rtxterror6,1700);
		$('#repassword').focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	captcha=$('#captcha').val();
	if (captcha == '') {
		openandclose(diverror,rtxterror5,1700);
		$('#captcha').focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	var checkBox = document.getElementById("termsr");

	if (checkBox.checked != true) {
		openandclose(diverror,rtxterror8,1700);
		$('#termsr').focus();
		setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		return;
	}

	usernamer = "ano_" + CryptoJS.MD5(email);
	usernamer = usernamer.substr(0, 15)

	$.ajax({
		type: 'POST',
		url: siteurl + "ajax/register/r:" + Math.round(Math.random()*1000),
		data: 'em=' + email + '&un=' + usernamer + '&pw=' + CryptoJS.MD5(passwordr) + '&cpt=' + captcha,
		success: function(resp) {
			switch (resp.charAt(0)) {
				case '0':
					openandclose(diverror,resp.substring(3),1700)
					setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
					break;
				case '1':
					location.href = siteurl + "dashboard";
					break;
			}
		},
		error: function() {
			openandclose(diverror,txtconnerror,1700)
			setTimeout(function() {$(btregister).removeAttr('disabled');}, 2000);
		} //end error

	}); // end ajax
}
