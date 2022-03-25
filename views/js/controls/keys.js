/*--------------------------------------
  Keys Controls
--------------------------------------*/

/* Function to validate formKey */
function controlFormKey() {
    // Declare
    var errors = 0;

    // Check keyName
    if (!regexKeyNames.test($("#keyName").val())) {
        // Change class
        invalidInputs("#keyName");

        // Count
        errors++;
    }
    else {
        // Change class
        validInputs("#keyName");
    }

    // Check keyUser
    if (!regexKeyUsers.test($("#keyUser").val())) {
        // Change class
        invalidInputs("#keyUser");

        // Count
        errors++;
    }
    else {
        // Change class
        validInputs("#keyUser");
    }

    // Check keyPwd
    if (!regexKeyPwds.test($("#keyPwd").val())) {
        // Change class
        invalidInputs("#keyPwd");

        // Count
        errors++;
    }
    else {
        // Change class
        validInputs("#keyPwd");
    }

    // Check keyNotes
    if (!regexKeyNotes.test($("#keyNotes").val())) {
        // Change class
        invalidInputs("#keyNotes");

        // Count
        errors++;
    }
    else {
        // Change class
        validInputs("#keyNotes");
    }

    // Errors control
    if (errors == 0) {
        // Return
        return true;
    }
    else {
        // Return
        return false;
    }
}
