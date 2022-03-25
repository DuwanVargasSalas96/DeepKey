<?php
    // Import
	require_once "Connection.php";

    /*--------------------------------------
	  Keys Class Model
	--------------------------------------*/
    class KeysMdl 
    {
        /* Method to create keys */
        public static function createKey($data)
        {
            // Declare Query
            $queryDB = Connection::connect() -> prepare("INSERT INTO DeepKeys (UserID, Name, User, Password, Notes) VALUES ((SELECT UserID FROM Users WHERE Email = :user), :keyName, :keyUser, :keyPwd, :keyNotes)");

            // Set data
            $queryDB -> bindParam("user", $data["user"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyName", $data["keyName"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyUser", $data["keyUser"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyPwd", $data["keyPwd"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyNotes", $data["keyNotes"], PDO::PARAM_STR);

            // Execute query
            $queryDB -> execute();
            
            // Control query
            if ($queryDB -> rowCount() > 0) {
                // Return
                return true;
            }
            else {
                // Return
                return false;
            }
        }


        /* Method to get keys */
        public static function getKeys($user)
        {
            // Declare Query
            $queryDB = Connection::connect() -> prepare("SELECT DeepKeyID, Name FROM DeepKeys WHERE UserID = (SELECT UserID FROM Users WHERE Email = :email)");

            // Set data
            $queryDB -> bindParam("email", $user, PDO::PARAM_STR);

            // Execute query
            $queryDB -> execute();

            // Return
            return $queryDB -> fetchAll();
        }


        /* Method to get key */
        public static function getKey($deepKeyID, $user)
        {
            // Declare Query
            $queryDB = Connection::connect() -> prepare("SELECT * FROM DeepKeys WHERE DeepKeyID = :deepKeyID AND UserID = (SELECT UserID FROM Users WHERE Email = :email)");

            // Set data
            $queryDB -> bindParam("deepKeyID", $deepKeyID, PDO::PARAM_INT);
            $queryDB -> bindParam("email", $user, PDO::PARAM_STR);

            // Execute query
            $queryDB -> execute();

            // Return
            return $queryDB -> fetch();
        }


        /* Method to update keys */
        public static function updateKey($data)
        {
            // Declare query
            $queryDB = Connection::connect() -> prepare("UPDATE DeepKeys SET Name = :keyName, User = :keyUser, Password = :keyPwd, Notes = :keyNotes WHERE DeepKeyID = :deepKeyID AND UserID = (SELECT UserID FROM Users WHERE Email = :email)");

            // Set data
            $queryDB -> bindParam("keyName", $data["keyName"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyUser", $data["keyUser"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyPwd", $data["keyPwd"], PDO::PARAM_STR);
            $queryDB -> bindParam("keyNotes", $data["keyNotes"], PDO::PARAM_STR);
            $queryDB -> bindParam("deepKeyID", $data["deepKeyID"], PDO::PARAM_INT);
            $queryDB -> bindParam("email", $data["user"], PDO::PARAM_STR);

            // Execute query
            $queryDB -> execute();

            // Query control
            if ($queryDB -> rowCount() > 0) {
                // Return
                return true;
            }
            else {
                // Return
                return false;
            }
        }

        
        /* Method to delete keys */
        public static function deleteKey($deepKeyID, $user)
        {
            // Declare query
            $queryDB = Connection::connect() -> prepare("DELETE FROM DeepKeys WHERE DeepKeyID = :deepKeyID AND UserID = (SELECT UserID FROM Users WHERE Email = :email)");

            // Set data
            $queryDB -> bindParam("deepKeyID", $deepKeyID, PDO::PARAM_INT);
            $queryDB -> bindParam("email", $user, PDO::PARAM_STR);

            // Execute query
            $queryDB -> execute();

            // Control query
            if ($queryDB -> rowCount() > 0) {
                // Return
                return true;
            }
            else {
                // Return
                return false;
            }
        }
    }
?>