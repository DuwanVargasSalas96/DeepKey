/*--------------------------------------
  Profile Requests
--------------------------------------*/

/* Function to get profile information */
function getProfileData() {
	// Request get profile data
	$.ajax({
		url: "controllers/ProfileReq.php",

		method: "POST",

		data: { "process": "getProfile" },

		success: function (request) {
			// test
			console.log(request);

			// Convert request
			request = JSON.parse(request);

			// Set data to form
			$("#inpProfileFirstName").val(request.firstName);
			$("#inpProfileLastName").val(request.lastName);
			$("#inpProfileEmail").val(request.email);
		},

		error: function (xhr, status) {
			// Log
			console.log("Get profile data error");
		}
	});
}


/* Function when document is ready */
$(document).ready(function()
{
	// Get profile data
	getProfileData();
});


/* Function to delete profile */
$(document).on("click", "#btnDeleteProfile", function() {
	// Request
	$.ajax({
		url: "controllers/ProfileReq.php",
		
		method: "POST",
		
		data: { "process": "deleteProfile" },
		
		success: function(request) {
			// Request control
			if (request == 1) {
				// Redirect to page
				window.location.href = "index.php?inf=2ec76b01237b65510384a92addca4f4730284807";
			}
			else {
				// Toast
				showToast("bg-danger", "Error en eliminación, intente nuevamente");
			}
		},

		error: function(xhr, status) {
			// Log
			console.log("Delete profile error");
		}
	});
});