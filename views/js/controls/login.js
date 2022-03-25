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
		invalidInputs("#inpLoginUser");
		
		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpLoginUser");
	}

	// Check inpLoginPwd
	if (!regexPwds.test($("#inpLoginPwd").val())) {
		// Change class
		invalidInputs("#inpLoginPwd");
		
		// Count
		errors++;
	}
	else {
		// Change class
		validInputs("#inpLoginPwd");
	}

	// Return
	if (errors != 0) {return false;}
});