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
				$data = array("firstName" => strtoupper($_POST["inpRegisterFirstName"]), "lastName" => strtoupper($_POST["inpRegisterLastName"]), "email" => strtolower($_POST["inpRegisterEmail"]), "password" => sha1($_POST["inpRegisterPwd"]));

				// Call model
				$request = ProfileMdl::createProfile($data);
				
				// Model control
				if ($request === "true") {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-success').text('Registro correcto de usuario.');
					});</script>";
				}
				else if ($request === "existent") {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-danger').text('Usuario ya se encuentra registrado.');
						$('#inpRegisterFirstName, #inpRegisterLastName, #inpRegisterEmail, #inpRegisterPwd, #inpRegisterPwdReply').addClass('is-invalid');
					});</script>";
				}
				else {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-danger').text('Registro incorrecto de usuario. Intente nuevamente.');
						$('#inpRegisterFirstName, #inpRegisterLastName, #inpRegisterEmail, #inpRegisterPwd, #inpRegisterPwdReply').addClass('is-invalid');
					});</script>";
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
				$data = array("firstName" => strtoupper($_POST["inpProfileFirstName"]), "lastName" => strtoupper($_POST["inpProfileLastName"]), "newEmail" => strtolower($_POST["inpProfileEmail"]), "oldEmail" => $email);

				// Call model
				$request = ProfileMdl::updateProfileData($data);

				// ProfileMdl control
				if (!empty($request) && $request == 1) {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-success').text('Datos actualizados correctamente.');
					});</script>";
					
					// Control update email
					if ($data["oldEmail"] != $data["newEmail"]) {
						// Redirect to page
						header("Location: index.php?kb=exit");
					}
				}
				else if (!empty($request) && $request == 2) {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-danger').text('Correo ingresado pertenece a otra cuenta.');
						$('#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail').addClass('is-invalid');
					});</script>";
				}
				else {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-danger').text('Datos no actualizados.');
						$('#inpProfileFirstName, #inpProfileLastName, #inpProfileEmail').addClass('is-invalid');
					});</script>";
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
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-success').text('Contraseña actualizada correctamente.');
					});</script>";
				}
				else {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-danger').text('Contraseña no actualizada, datos invalidos.');
						$('#inpProfilePwdOld, #inpProfilePwdNew, #inpProfilePwdReply').addClass('is-invalid');
					});</script>";
				}
			}
		}
	}
?>