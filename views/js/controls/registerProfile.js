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
		invalidInputs("#inpRegisterFirstName");
		
		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpRegisterFirstName");
	}

	// Check inpRegisterLastName
	if (!regexTexts.test($("#inpRegisterLastName").val())) {
		// Change class
		invalidInputs("#inpRegisterLastName");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpRegisterLastName");
	}

	// Check inpRegisterEmail
	if (!regexEmails.test($("#inpRegisterEmail").val())) {
		// Change class
		invalidInputs("#inpRegisterEmail");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpRegisterEmail");
	}

	// Check inpRegisterPwd
	if (!regexPwds.test($("#inpRegisterPwd").val())) {
		// Change class
		invalidInputs("#inpRegisterPwd");

		// Contador
		errors++;
	}
	else {
		// Change class
		validInputs("#inpRegisterPwd");
	}

	// Check inpRegisterPwdReply
	if (!regexPwds.test($("#inpRegisterPwdReply").val()) || $("#inpRegisterPwdReply").val() != $("#inpRegisterPwd").val()) {
		// Change class
		invalidInputs("#inpRegisterPwdReply");

		// Contador
		errors++;
	}
	else {
		// Change class
		validInputs("#inpRegisterPwdReply");
	}

	// Return
	if (errors != 0) {return false;}
});