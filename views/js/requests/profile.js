/*--------------------------------------
  Profile Requests
--------------------------------------*/

/* Function to get profile information */
$(document).ready(function()
{
	// Request ajax
	$.ajax ({
		url: "controllers/ProfileReq.php",

		method: "POST",

		data: { "process": "read" },

		success: function(request) {
			// Convert data
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
});


/* Function to delete profile */
$(document).on("click", "#btnDeleteProfile", function() {
	// Request
	$.ajax({
		url: "controllers/ProfileReq.php",
		
		method: "POST",
		
		data: { "process": "delete" },
		
		success: function(request) {
			// Request control
			if (request == 1) {
				// Toast
				$(document).ready(function() {
					$(".toast").toast("show");
					$(".toast .toast-body").addClass("bg-success").text("Perfil eliminado.");
				});

				// Redirect to page
				setTimeout(function() {
					window.location.href = "index.php?kb=exit";	
				}, 2500);
			}
			else {
				// Toast
				$(document).ready(function() {
					$(".toast").toast("show");
					$(".toast .toast-body").addClass("bg-danger").text("Perfil no eliminado.");
				});
			}
		},

		error: function(xhr, status) {
			// Log
			console.log("Delete profile error");
		}
	});
});