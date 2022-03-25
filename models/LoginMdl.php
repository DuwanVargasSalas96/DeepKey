<?php
	// Import Connection Class
	require_once "Connection.php";
	
	/*--------------------------------------
	  Login Class Model
	--------------------------------------*/
	class LoginMdl
	{	
		/* Method to handle login */
		public static function main($data)
		{
			// Declare query
			$queryDB = Connection::connect() -> prepare("SELECT Email, Password FROM Users WHERE Email = :email AND Password = :password");
			
			// Set data
			$queryDB -> bindParam("email", $data["email"], PDO::PARAM_STR);
			$queryDB -> bindParam("password", $data["password"], PDO::PARAM_STR);
			
			// Execute query
			$queryDB -> execute();
			
			// Return
			return $queryDB -> fetch();
		}
	}
?>
