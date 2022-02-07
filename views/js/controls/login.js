/*--------------------------------------
  Login Control
--------------------------------------*/

/* Function to validate data from login form */
$(document).on("submit", "#formLogin", function()
{
	// Declare
	var errors = 0;

	// Check inpLoginUser
	if (!regexEmails.test($("#inpLoginUser").val())) {
		// Change class
		$("#inpLoginUser").addClass("is-invalid");
		
		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpLoginUser").removeClass("is-invalid");
	}

	// Check inpLoginPwd
	if (!regexPwds.test($("#inpLoginPwd").val())) {
		// Change class
		$("#inpLoginPwd").addClass("is-invalid");
		
		// Count
		errors++;
	}
	else {
		// Change class
		$("#inpLoginPwd").removeClass("is-invalid");
	}

	// Return
	if (errors != 0) {return false;}
});