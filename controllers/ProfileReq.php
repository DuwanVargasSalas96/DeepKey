<?php
	/* Session control */
	session_start();

	// Session control
	if (!$_SESSION["state"]) {
		// Redirect to page
		header("location:index.php?kb=exit");	

		// Logout
		exit();
	}
	
	// Import profile model
	require_once "../models/ProfileMdl.php";

	/*--------------------------------------
	  Profile Requests Controller
	--------------------------------------*/
	
	/* Code to get profile information */
	if (isset($_POST["process"]) &&
		$_POST["process"] === "getProfile") {
		
		// Call model
		$request = ProfileMdl::getProfileData($_SESSION["user"]);

		// Declare
		$data = array("firstName" => ucwords(strtolower($request["FirstName"])), "lastName" => ucwords(strtolower($request["LastName"])), "email" => $request["Email"]);

		// Return
		echo json_encode($data);
	}

	
	/* Code to delete profile */
	if (isset($_POST["process"]) &&
		$_POST["process"] === "deleteProfile") {
		
		// Return from model
		echo ProfileMdl::deleteProfile($_SESSION["user"]);
	}
?>

