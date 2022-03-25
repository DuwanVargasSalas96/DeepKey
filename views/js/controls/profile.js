/*--------------------------------------
  Profile Control
--------------------------------------*/

/* Function to validate data from profile information form */
$(document).on("submit", "#formProfileData", function() {
	// Declare
	var errors = 0;

	// Check inpProfileName
	if (!regexTexts.test($("#inpProfileFirstName").val())) {
		// Change class
		invalidInputs("#inpProfileFirstName");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpProfileFirstName");
	}

	// Check inpProfileLastName
	if (!regexTexts.test($("#inpProfileLastName").val())) {
		// Change class
		invalidInputs("#inpProfileLastName");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpProfileLastName");
	}

	// Check inpProfileEmail
	if (!regexEmails.test($("#inpProfileEmail").val())) {
		// Modificar clase
		invalidInputs("#inpProfileEmail");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpProfileEmail");
	}

	// Return
	if (errors != 0) {return false;}
});


/* Function to validate data from update password from */
$(document).on("submit", "#formProfilePwd", function() {
	// Declarar
	var errors = 0;

	// Validar Clave Anterior
	if (!regexPwds.test($("#inpProfilePwdOld").val())) {
		// Change class
		invalidInputs("#inpProfilePwdOld");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpProfilePwdOld");
	}

	// Validar Clave Nueva
	if (!regexPwds.test($("#inpProfilePwdNew").val()) || $("#inpProfilePwdNew").val() == $("#inpProfilePwdOld").val()) {
		// Change class
		invalidInputs("#inpProfilePwdNew");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpProfilePwdNew");
	}

	// Validar Confirmacion
	if (!regexPwds.test($("#inpProfilePwdReply").val()) || $("#inpProfilePwdReply").val() != $("#inpProfilePwdNew").val()) {
		// Change class
		invalidInputs("#inpProfilePwdReply");

		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpProfilePwdReply");
	}

	// Return
	if (errors != 0) {return false;}
});