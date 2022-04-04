<?php
	/* Session manager */
	session_start();

	// Session control
	if (!$_SESSION["state"]) {
		// Redirect to page
		header("location:index.php?kb=exit");	

		// Logout
		exit();
	}
	
	// Import controller
	require_once "../controllers/Regex.php";

	// Import model
	require_once "../models/KeysMdl.php";

	/*--------------------------------------
	  Keys Requests Controller
	--------------------------------------*/

	/* Code to get key */
	if (isset($_POST["process"]) &&
		$_POST["process"] === "getKey" &&
		isset($_POST["deepKeyID"]))
	{
		// Call model
		$request = KeysMdl::getKey($_POST["deepKeyID"], $_SESSION["user"]);

		// Declare
		$data = array("name" => $request["Name"], "user" => $request["User"], "pwd" => $request["Password"], "notes" => $request["Notes"]);

		// Return
		echo json_encode($data);
	}


	/* Code to get keys */
	if (isset($_POST["process"]) && $_POST["process"] === "getKeys") {
		// Call model
		$request = KeysMdl::getKeys($_SESSION["user"]);

		// Return
		foreach($request as $key) {
			// Return
			echo "<li class='list-group-item list-group-item-action' value='" . $key["DeepKeyID"] . "'>" . $key["Name"] . "</li>";
		}
	}


	/* Code to create key */
	if (isset($_POST["process"]) &&
		$_POST["process"] === "createKey" &&
		isset($_POST["keyName"]) &&
		isset($_POST["keyUser"]) &&
		isset($_POST["keyPwd"]) &&
		isset($_POST["keyNotes"]) &&
		preg_match(Regex::keyNames(), $_POST["keyName"]) &&
		preg_match(Regex::keyUsers(), $_POST["keyUser"]) &&
		preg_match(Regex::keyPwds(), $_POST["keyPwd"]) &&
		preg_match(Regex::keyNotes(), $_POST["keyNotes"]))
	{	
		// Declare
		$data = array("user" => $_SESSION["user"], "keyName" => $_POST["keyName"], "keyUser" => $_POST["keyUser"], "keyPwd" => $_POST["keyPwd"], "keyNotes" => $_POST["keyNotes"]);

		// Return
		echo $request = KeysMdl::createKey($data);
	}

	
	/* Code to update key */
	if (isset($_POST["process"]) &&
		$_POST["process"] === "updateKey" &&
		isset($_POST["deepKeyID"]) &&
		isset($_POST["keyName"]) &&
		isset($_POST["keyUser"]) &&
		isset($_POST["keyPwd"]) &&
		isset($_POST["keyNotes"]) &&
		preg_match(Regex::keyNames(), $_POST["keyName"]) &&
		preg_match(Regex::keyUsers(), $_POST["keyUser"]) &&
		preg_match(Regex::keyPwds(), $_POST["keyPwd"]) &&
		preg_match(Regex::keyNotes(), $_POST["keyNotes"]))
	{	
		// Declare
		$data = array("deepKeyID" => $_POST["deepKeyID"], "keyName" => $_POST["keyName"], "keyUser" => $_POST["keyUser"], "keyPwd" => $_POST["keyPwd"], "keyNotes" => $_POST["keyNotes"], "user" => $_SESSION["user"]);

		// Return
		echo $request = KeysMdl::updateKey($data);
	}


	/* Code to delete key */
	if (isset($_POST["process"]) &&
		isset($_POST["deepKeyID"]) &&
		$_POST["process"] === "deleteKey")
	{		
		// Return
		echo $request = KeysMdl::deleteKey($_POST["deepKeyID"], $_SESSION["user"]);
	}
?>