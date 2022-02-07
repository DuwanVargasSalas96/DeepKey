<?php
	/*-------------------------------------
	  Login Class Controller
	-------------------------------------*/
	class LoginCtl
	{	
		/* Method to handle login */
		public function login()
		{
			// Catch data
			if (isset($_POST["inpLoginUser"]) && 
					isset($_POST["inpLoginPwd"]) &&
					filter_var($_POST["inpLoginUser"], FILTER_VALIDATE_EMAIL)) {
				
				// Declare
				$data = array("email" => strtolower($_POST["inpLoginUser"]), "password" => sha1($_POST["inpLoginPwd"]));
				
				// Call model
				$request = LoginMdl::main($data);

				// Model control
				if (!empty($request) && 
					$data["email"] == $request["Email"] && 
					$data["password"] == $request["Password"]) {
					
					// Create session
					session_start();
					$_SESSION["user"] = $request["Email"];
					$_SESSION["password"] = $request["Password"];
					$_SESSION["state"] = true;
					
					// Redirect to page
					header("location:index.php?kb=home");
				}
				else {
					// Toast
					echo "<script>$(document).ready(function() {
						$('.toast').toast('show');
						$('.toast .toast-body').addClass('bg-danger').text('Datos de acceso incorrectos.');
						$('#inpLoginUser, #inpLoginPwd').addClass('is-invalid');
					});</script>";
				}
			}
		}
	}
?>
