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