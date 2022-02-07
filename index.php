<?php
	// Import controllers and models
	require_once "controllers/LoginCtl.php";
	require_once "controllers/MainCtl.php";
	require_once "controllers/ProfileCtl.php";
	require_once "controllers/Regex.php";
	require_once "models/LoginMdl.php";
	require_once "models/MainMdl.php";
	require_once "models/ProfileMdl.php";

	// Create template controller
	$ctl = new MainCtl();
	$ctl -> template();
?>