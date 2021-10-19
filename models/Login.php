<?php
    //Import
    require_once "Connection.php";

    class LoginM
    {
        public static function login($data)
        {
            //Declare
            $queryDB = Connection::connect()->prepare("SELECT Email, Password FROM Users WHERE Email = :user AND Password = :password");
            //Set
            $queryDB->bindParam("user", $data["user"], PDO::PARAM_STR);
            $queryDB->bindParam("password", $data["password"], PDO::PARAM_STR);
            //Execute
            $queryDB->execute();
            //Return
            return $queryDB->fetch();
            //Close connection
            $queryDB = null;
        }
    }
?>