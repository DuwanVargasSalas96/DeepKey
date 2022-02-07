/*--------------------------------------
  Register Profile Control
--------------------------------------*/

/* Function to validate data from register profile form */
$(document).on("submit", "#formRegister", function()
{
	// Declare
	var errors = 0;

	// Check inpRegisterFirstName
	if (!regexTexts.test($("#inpRegisterFirstName").val())) {
		// Change class
		$("#inpRegisterFirstName").addClass("is-invalid");
		
		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpRegisterFirstName").removeClass("is-invalid");
	}

	// Check inpRegisterLastName
	if (!regexTexts.test($("#inpRegisterLastName").val())) {
		// Change class
		$("#inpRegisterLastName").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpRegisterLastName").removeClass("is-invalid");
	}

	// Check inpRegisterEmail
	if (!regexEmails.test($("#inpRegisterEmail").val())) {
		// Change class
		$("#inpRegisterEmail").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpRegisterEmail").removeClass("is-invalid");
	}

	// Check inpRegisterPwd
	if (!regexPwds.test($("#inpRegisterPwd").val())) {
		// Change class
		$("#inpRegisterPwd").addClass("is-invalid");

		// Contador
		errors++;
	}
	else {
		// Change class
		$("#inpRegisterPwd").removeClass("is-invalid");
	}

	// Check inpRegisterPwdReply
	if (!regexPwds.test($("#inpRegisterPwdReply").val()) || $("#inpRegisterPwdReply").val() != $("#inpRegisterPwd").val()) {
		// Change class
		$("#inpRegisterPwdReply").addClass("is-invalid");

		// Contador
		errors++;
	}
	else {
		// Change class
		$("#inpRegisterPwdReply").removeClass("is-invalid");
	}

	// Return
	if (errors != 0) {return false;}
});