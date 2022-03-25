<?php
	/*--------------------------------------
	  Profile class controller
	--------------------------------------*/
	class ProfileCtl
	{
		/* Method to create profile */
		public function createProfile()
		{
			// Catch data
			if (isset($_POST["inpRegisterFirstName"]) && 
				isset($_POST["inpRegisterLastName"]) && 
				isset($_POST["inpRegisterEmail"]) && 
				isset($_POST["inpRegisterPwd"]) && 
				isset($_POST["inpRegisterPwdReply"]) && 
				preg_match(Regex::texts(), $_POST["inpRegisterFirstName"]) &&
				preg_match(Regex::texts(), $_POST["inpRegisterLastName"]) &&
				filter_var($_POST["inpRegisterEmail"], FILTER_VALIDATE_EMAIL) &&
				preg_match(Regex::pwds(), $_POST["inpRegisterPwd"]) &&
				preg_match(Regex::pwds(), $_POST["inpRegisterPwdReply"]) &&
				$_POST["inpRegisterPwd"] == $_POST["inpRegisterPwdReply"]) {
				
				// Declare
				$data = array("firstName" => strtolower($_POST["inpRegisterFirstName"]), "lastName" => strtolower($_POST["inpRegisterLastName"]), "email" => strtolower($_POST["inpRegisterEmail"]), "password" => sha1($_POST["inpRegisterPwd"]));

				// Call model
				$request = ProfileMdl::createProfile($data);
				
				// Model control
				if ($request === "true") {
					// Redirect to page
					header("location:index.php?inf=38b191788c000b97aad3045256e7bae1879c0e7f");
				}
				else if ($request === "existent") {
					// Toast
					echo "<script> 
						showToast('bg-warning', 'Usuario ya registrado');
						invalidInputs('#inpRegisterFirstName, #inpRegisterLastName, #inpRegisterEmail, #inpRegisterPwd, #inpRegisterPwdReply');
					</script>";
				}
				else {
					// Toast
					echo "<script>
						showToast('bg-danger', 'Error en registro, intente nuevamente');
						invalidInputs('#inpRegisterFirstName, #inpRegisterLastName, #inpRegisterEmail, #inpRegisterPwd, #inpRegisterPwdReply');
					</script>";
				}
			}
		}

		
		/* Method to update profile information */
		public function updateProfileData($email)
		{
			// Catch data
			if (isset($_POST["inpProfileFirstName"]) &&
				isset($_POST["inpProfileLastName"]) &&
				isset($_POST["inpProfileEmail"]) &&
				preg_match(Regex::texts(), $_POST["inpProfileFirstName"]) &&
				preg_match(Regex::texts(), $_POST["inpProfileLastName"]) &&
				filter_var($_POST["inpProfileEmail"], FILTER_VALIDATE_EMAIL) &&
				filter_var($email, FILTER_VALIDATE_EMAIL)) {

				// Declare
				$data = array("firstName" => strtolower($_POST["inpProfileFirstName"]), "lastName" => strtolower($_POST["inpProfileLastName"]), "newEmail" => strtolower($_POST["inpProfileEmail"]), "oldEmail" => $email);

				// Call model
				$request = ProfileMdl::updateProfileData($data);

				// ProfileMdl control
				if (!empty($request) && $request == 1) {
					// Control update email
					if ($data["oldEmail"] != $data["newEmail"]) {
						// Redirect to page
						header("Location: index.php?inf=537db2bc9b23325af0c804de559cca06bebbb1de");
					}

					// Toast
					echo "<script> showToast('bg-success', 'Datos actualizados correctamente'); </script>";
				}
				else if (!empty($request) && $request == 2) {
					// Toast
					echo "<script>
						showToast('bg-danger', 'Correo ingresado, pertenece a otra cuenta');
						invalidInputs('#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail');
					</script>";
				}
				else {
					// Toast
					echo "<script>
						showToast('bg-danger', 'Error en cambios, intente nuevamente');
						invalidInputs('#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail');
					</script>";
				}
			}
		}

		
		/* Method to change password */
		public function updateProfilePassword($email)
		{
			// Catch data
			if (isset($_POST["inpProfilePwdOld"]) &&
				isset($_POST["inpProfilePwdNew"]) &&
				isset($_POST["inpProfilePwdReply"]) &&
				filter_var($email, FILTER_VALIDATE_EMAIL) &&
				preg_match(Regex::pwds(), $_POST["inpProfilePwdOld"]) &&
				preg_match(Regex::pwds(), $_POST["inpProfilePwdNew"]) &&
				preg_match(Regex::pwds(), $_POST["inpProfilePwdReply"]) &&
				$_POST["inpProfilePwdReply"] == $_POST["inpProfilePwdNew"] &&
				$_POST["inpProfilePwdNew"] != $_POST["inpProfilePwdOld"]) {

				// Declare
				$data = array("email" => $email, "oldPassword" => sha1($_POST["inpProfilePwdOld"]), "newPassword" => sha1($_POST["inpProfilePwdNew"]));

				// Call model
				$request = ProfileMdl::updateProfilePassword($data);

				// ProfileMdl control
				if (!empty($request) && $request != 0) {
					// Toast
					echo "<script> showToast('bg-success', 'Contraseña actualizada correctamente'); </script>";
				}
				else {
					// Toast
					echo "<script>
						showToast('bg-danger', 'Error en cambios, intente nuevamente');
						invalidInputs('#inpProfilePwdOld, #inpProfilePwdNew, #inpProfilePwdReply');
					</script>";
				}
			}
		}
	}
?>