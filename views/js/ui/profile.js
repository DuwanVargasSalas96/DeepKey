/*--------------------------------------
  Profile UI
--------------------------------------*/

/* Function to handle profile information form */
$(document).on("click", "#btnEditProfile", function() {
	// Catch form status
	if ($("#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail").attr("readonly")) {
		// Change form
		$("#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail").removeAttr("readonly");
		$("#formProfileData button[type=submit]").removeClass("d-none");
		$(this).removeClass("bg-primary").addClass("bg-danger").text("Cancelar");
	}
	else {
		// Request get profile data
		$.ajax ({
			url: "controllers/ProfileReq.php",

			method: "POST",

			data: { "process": "read" },

			success: function(request) {
				// Convert request
				request = JSON.parse(request);
				
				// Set data to form
				$("#inpProfileFirstName").val(request.firstName);
				$("#inpProfileLastName").val(request.lastName);
				$("#inpProfileEmail").val(request.email);
			},

			error: function(xhr, status) {
				// Log
				console.log("Get profile data error");
			}
		});

		// Change form
		$("#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail").attr("readonly", true).removeClass("is-invalid");
		$("#formProfileData button[type=submit]").addClass("d-none");
		$(this).removeClass("bg-danger").addClass("bg-primary").text("Editar Información");
	}
});