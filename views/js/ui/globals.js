/*--------------------------------------
  Global Interactions
--------------------------------------*/

/* Function to toggle inputs of the type password */
$(document).on("click", ".input-group > .input-group-append > span", function ()
{
	// Toggle
	if ($(this).parent().siblings("input").attr("type") == "password") {
		// Change attributes
		$(this).parent().siblings("input").attr("type", "text");

		// Change icon
		$("i", this).removeClass("fa-eye").addClass("fa-eye-slash");
	}
	else {
		// Change attributes
		$(this).parent().siblings("input").attr("type", "password");

		// Change icon
		$("i", this).removeClass("fa-eye-slash").addClass("fa-eye");
	}
});


/* Function to reset Toast status */
$(document).on("hidden.bs.toast", ".toast", function ()
{
	// Remove classes
	$(".toast div.toast-body").removeClass("bg-success bg-danger");
});

/* Function to invalid inputs */
function invalidInputs(inputs) {
	$(document).ready(function() {
		// Change inputs properties
		$(inputs).addClass("is-invalid");
	});
}


/* Function to valid inputs */
function validInputs(inputs) {
	$(document).ready(function() {
		// Change inputs properties
		$(inputs).removeClass("is-invalid");
	});
}


/* Function to show Toast */
function showToast(type, txt) {
	$(document).ready(function() {
		// Show toast
		$(".toast").toast("show");

		// Change toast properties
		$(".toast .toast-body").addClass(type).text(txt);
	});
}


/* Function to change information page */
function changePageInformation(title, text, icon) {
	$(document).ready(function() {
		// Set title
		$("#infTitle").text(title);

		// Set text
		$("#infText").text(text);
		
		// Change icon
		$("#infIcon").addClass(icon);
	});
}