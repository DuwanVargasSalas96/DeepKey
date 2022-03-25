/*--------------------------------------
  Keys Requests
--------------------------------------*/

/* Function to get keys */
function keyList() {
	// Request ajax
	$.ajax ({
		url: "controllers/KeysReq.php",

		method: "POST",

		data: { "process": "getKeys" },

		success: function(request) {			
			// Print
			$("#keyList").html(request);
		},

		error: function(xhr, status) {
			// Log
			console.log("Get keys error");
		}
	});
}


/* Function when document is ready */
$(document).ready(function() {
	// Execute keyList
	keyList();
})


/* Function to create and edit keys */
$(document).on("submit", "#formKey", function(e) {
	// Prevent default behavior
	e.preventDefault();

	/* Request to create key */
	if (controlFormKey() && $("#btnDeleteKey").val() == "") {
		// Request ajax
		$.ajax ({
			url: "controllers/KeysReq.php",

			method: "POST",

			data: { "process": "createKey", "keyName": $("#keyName").val(), "keyUser": $("#keyUser").val(), "keyPwd": $("#keyPwd").val(), "keyNotes": $("#keyNotes").val() },

			success: function(request) {
				// Hide modal
				$("#modalKeys").modal("hide");
				
				// Control
				if (request == 1) {
					// Toast
					showToast("bg-success", "Registro creado correctamente");
				}
				else {
					// Toast
					showToast("bg-danger", "Error en creación de registro, intente nuevamente");
				}

				// Update keyList
				keyList();
			},

			error: function(xhr, status) {
				// Log
				console.log("Saving key error");
			}
		});
	}
	
	/* Function to update key */
	else if (controlFormKey() && $("#btnDeleteKey").val() != "") {
		// Request ajax
		$.ajax ({
			url: "controllers/KeysReq.php",

			method: "POST",

			data: { "process": "updateKey", "deepKeyID": $("#btnDeleteKey").val(), "keyName": $("#keyName").val(), "keyUser": $("#keyUser").val(), "keyPwd": $("#keyPwd").val(), "keyNotes": $("#keyNotes").val() },

			success: function(request) {
				// Change controls
				$("#modalKeys .modal-title").text($("#keyName").val());
				showKeyData($("#btnDeleteKey").val());

				// Control
				if (request == 1) {
					// Toast
					showToast("bg-success", "Registro actualizado correctamente");
				}
				else {
					// Toast
					showToast("bg-danger", "Error actualizando registro, intente nuevamente");
				}

				// Update keyList
				keyList();
			},

			error: function(xhr, status) {
				// Log
				console.log("Saving key error");
			}
		});
	}
});


/* Function to get key data */
$(document).on("click", "#keyList > li", function() {
	// Request ajax
	$.ajax ({
		url: "controllers/KeysReq.php",

		method: "POST",

		data: { "process": "getKey", "deepKeyID": $(this).val() },

		success: function(request) {			
			// Convert
			request = JSON.parse(request);
			
			// Print
			$("#modalKeys .modal-title").text(request.name);
			$("#keyName").val(request.name);
			$("#keyUser").val(request.user);
			$("#keyPwd").val(request.pwd);
			$("#keyNotes").val(request.notes);
		},

		error: function(xhr, status) {
			// Log
			console.log("Get key error");
		}
	});
});


/* Function to delete keys */
$(document).on("click", "#btnDeleteKey", function() {
	// Request ajax
	$.ajax ({
		url: "controllers/KeysReq.php",

		method: "POST",

		data: { "process": "deleteKey", "deepKeyID": $(this).val() },
		
		success: function(request) {
			// Hide modal
			$("#modalKeys").modal("hide");

			// Control
			if (request == 1) {				
				// Toast
				showToast("bg-success", "Registro eliminado correctamente");
			}
			else {
				// Toast
				showToast("bg-danger", "Error en eliminación, intente nuevamente");
			}

			// Update keyList
			keyList();
		},

		error: function(xhr, status) {
			// Log
			console.log("Delete key error");
		}
	});
});