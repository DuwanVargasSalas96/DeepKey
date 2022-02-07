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
		$("#inpProfileFirstName").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpProfileFirstName").removeClass("is-invalid");
	}

	// Check inpProfileLastName
	if (!regexTexts.test($("#inpProfileLastName").val())) {
		// Change class
		$("#inpProfileLastName").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpProfileLastName").removeClass("is-invalid");
	}

	// Check inpProfileEmail
	if (!regexEmails.test($("#inpProfileEmail").val())) {
		// Modificar clase
		$("#inpProfileEmail").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpProfileEmail").removeClass("is-invalid");
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
		$("#inpProfilePwdOld").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpProfilePwdOld").removeClass("is-invalid");
	}

	// Validar Clave Nueva
	if (!regexPwds.test($("#inpProfilePwdNew").val()) || $("#inpProfilePwdNew").val() == $("#inpProfilePwdOld").val()) {
		// Change class
		$("#inpProfilePwdNew").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpProfilePwdNew").removeClass("is-invalid");
	}

	// Validar Confirmacion
	if (!regexPwds.test($("#inpProfilePwdReply").val()) || $("#inpProfilePwdReply").val() != $("#inpProfilePwdNew").val()) {
		// Change class
		$("#inpProfilePwdReply").addClass("is-invalid");

		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpProfilePwdReply").removeClass("is-invalid");
	}

	// Return
	if (errors != 0) {return false;}
});