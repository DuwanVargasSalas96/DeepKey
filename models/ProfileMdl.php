<?php	
	// Import
	require_once "Connection.php";

	/*--------------------------------------
	  Profile Class Model
	--------------------------------------*/
	class ProfileMdl
	{
		/* Method to create profile */
		public static function createProfile($data)
		{	
			/* Process to validate old profiles in the database */

			// Declare query
			$queryDB = Connection::connect() -> prepare("SELECT Email FROM Users WHERE Email = :email");

			// Set data
			$queryDB -> bindParam("email", $data["email"], PDO::PARAM_STR);
			
			// Execute query
			$queryDB -> execute();
			
			/* Process to create new profile */
			
			if (empty($queryDB -> fetch())) {
				// Set query
				$queryDB = Connection::connect() -> prepare("INSERT INTO Users (FirstName, LastName, Email, Password, State) VALUES(:firstName, :lastName, :email, :password, 1)");
				
				// Set data
				$queryDB -> bindParam("firstName", $data["firstName"], PDO::PARAM_STR);
				$queryDB -> bindParam("lastName", $data["lastName"], PDO::PARAM_STR);
				$queryDB -> bindParam("email", $data["email"], PDO::PARAM_STR);
				$queryDB -> bindParam("password", $data["password"], PDO::PARAM_STR);
				
				// Execute query
				$queryDB -> execute();

				// Control query
				if ($queryDB -> rowCount() > 0) {
					// Return
					return "true";
				}
				else {
					// Return
					return "false";
				}

				// Close query
				// $queryDB = null;
			}	
			else {
				// Return
				return "existent";

				// Close query
				// $queryDB = null;				
			}
		}
		

		/* Method to get profile information */
		public static function readProfile($email) {
			// Declare query
			$queryDB = Connection::connect() -> prepare("SELECT FirstName, LastName, Email FROM Users WHERE Email = :email");

			// Set data
			$queryDB -> bindParam("email", $email, PDO::PARAM_STR);

			// Execute query
			$queryDB -> execute();

			// Return
			return $queryDB -> fetch();

			// Close query
			// $queryDB = null;
		}

		
		/* Method to update profile information */
		public static function updateProfileData($data) {		
			// Control email update
			if ($data["oldEmail"] === $data["newEmail"]) {
				// Declare query
				$queryDB = Connection::connect() -> prepare("UPDATE Users SET FirstName = :firstName, LastName = :lastName WHERE Email = :oldEmail");

				// Set data
				$queryDB -> bindParam("firstName", $data["firstName"], PDO::PARAM_STR);
				$queryDB -> bindParam("lastName", $data["lastName"], PDO::PARAM_STR);
				$queryDB -> bindParam("oldEmail", $data["oldEmail"], PDO::PARAM_STR);

				// Execute query
				$queryDB -> execute();
				
				// Return
				return $queryDB -> rowCount();

				// Close query
				// $queryDB = null;
			}
			else {
				// Declare query
				$queryDB = Connection::connect() -> prepare("SELECT Email FROM Users WHERE Email = :newEmail");

				// Set data
				$queryDB -> bindParam("newEmail", $data["newEmail"], PDO::PARAM_STR);

				// Execute query
				$queryDB -> execute();

				// Control query
				if ($queryDB -> rowCount() == 0) {
					// Declare query
					$queryDB = Connection::connect() -> prepare("UPDATE Users SET FirstName = :firstName, LastName = :lastName, Email = :newEmail WHERE Email = :oldEmail");

					// Set data
					$queryDB -> bindParam("firstName", $data["firstName"], PDO::PARAM_STR);
					$queryDB -> bindParam("lastName", $data["lastName"], PDO::PARAM_STR);
					$queryDB -> bindParam("newEmail", $data["newEmail"], PDO::PARAM_STR);
					$queryDB -> bindParam("oldEmail", $data["oldEmail"], PDO::PARAM_STR);

					// Execute
					$queryDB -> execute();

					// Return
					return $queryDB -> rowCount();

					// Close query
					// $queryDB = null;
				}
				else {
					// Return
					return 2;

					// Cerrar consulta
					// $queryDB = null;
				}
			}
		}

		
		/* Method to update password */
		public static function updateProfilePassword($data) {
			// Declare query
			$queryDB = Connection::connect() -> prepare("UPDATE Users SET Password = :newPassword WHERE Email = :email AND Password = :oldPassword");

			// Set data
			$queryDB -> bindParam("newPassword", $data["newPassword"], PDO::PARAM_STR);
			$queryDB -> bindParam("email", $data["email"], PDO::PARAM_STR);
			$queryDB -> bindParam("oldPassword", $data["oldPassword"], PDO::PARAM_STR);

			// Execute query
			$queryDB -> execute();

			// Return
			return $queryDB -> rowCount();
			
			// Close query
			// $queryDB = null;
		}

		
		/* Method to delete profile */
		public static function deleteProfile($email) {
			// Declare query
			$queryDB = Connection::connect() -> prepare("DELETE FROM DeepKeys WHERE UserID = (SELECT UserID FROM Users WHERE Email = :email)");

			// Set data
			$queryDB -> bindParam("email", $email, PDO::PARAM_STR);

			// Execute query
			if ($queryDB -> execute()) {
				// Set query
				$queryDB = Connection::connect() -> prepare("DELETE FROM Users WHERE Email = :email");

				// Set data
				$queryDB -> bindParam("email", $email, PDO::PARAM_STR);

				// Execute query
				$queryDB -> execute();

				// Return
				return $queryDB -> rowCount();

				// Close query
				// $queryDB = null;
			}
			else {
				// Return
				return 0;

				// Close query
				// $queryDB = null;
			}
		}
	}
?>