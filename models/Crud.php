<?php
require_once "Connection.php";
class DataDB extends Connection
{
    //Editar keys
    public static function accountUpdate($user, $data)
    {
        //Declarar
        $queryDB = Connection::connect()->prepare("UPDATE DeepKeys SET Name = :keyName, User = :keyUser, Password = :keyPassword WHERE DeepKeyId = :keyId AND UserId = (SELECT UserId FROM Users WHERE Email = :user)");
        //Set
        $queryDB->bindParam("keyName", $data["keyName"], PDO::PARAM_STR);
        $queryDB->bindParam("keyUser", $data["keyUser"], PDO::PARAM_STR);
        $queryDB->bindParam("keyPassword", $data["keyPassword"], PDO::PARAM_STR);
        $queryDB->bindParam("keyId", $data["keyId"], PDO::PARAM_INT);
        $queryDB->bindParam("user", $user, PDO::PARAM_STR);
        //Execute
        $queryDB->execute();
        //Return
        return $queryDB->rowCount();
        //Close connection
        $queryDB = null;
    }

    //Delete key
    public static function accountDelete($user, $keyid)
    {
        //Declare
        $queryDB = Connection::connect()->prepare("DELETE FROM DeepKeys WHERE DeepKeyId = :keyid AND UserId = (SELECT UserId FROM Users WHERE Email = :user)");
        //Set
        $queryDB->bindParam("keyid", $keyid, PDO::PARAM_INT);
        $queryDB->bindParam("user", $user, PDO::PARAM_STR);
        //Execute
        $queryDB->execute();
        //Return
        return $queryDB->rowCount();
        //Close connection
        $queryDB = null;
    }

    //Get information key
    public static function accountInformation($user, $keyid)
    {
        //Declare
        $queryDB = Connection::connect()->prepare("SELECT Name, User, Password FROM DeepKeys WHERE DeepKeyId = :keyid AND UserId = (SELECT UserId FROM Users WHERE Email = :user)");
        //Set data
        $queryDB->bindParam("keyid", $keyid, PDO::PARAM_INT);
        $queryDB->bindParam("user", $user, PDO::PARAM_STR);
        //Execute
        $queryDB->execute();
        //Return
        return $queryDB->fetch();
        //Cerrar
        $queryDB = null;
    }

    //List keys
    public static function accountList($user)
    {
        //Declare
        $queryDB = Connection::connect()->prepare("SELECT * FROM DeepKeys WHERE UserId = (SELECT UserId FROM Users WHERE Email = :user) ORDER BY Name ASC");
        //Set data
        $queryDB->bindParam("user", $user, PDO::PARAM_STR);
        //Execute
        $queryDB->execute();
        //Return
        return $queryDB->fetchAll();
        //Close connection
        $queryDB = null;
    }

    //Add key
    public static function accountRegister($user, $data)
    {
        //Declare
        $queryDB = Connection::connect()->prepare("INSERT INTO DeepKeys (UserId, Name, User, Password) VALUES ((SELECT UserId FROM Users WHERE Email = :user), :keyName, :keyUser, :keyPassword)");
        //Set data
        $queryDB->bindParam("user", $user, PDO::PARAM_STR);
        $queryDB->bindParam("keyName", $data["keyName"], PDO::PARAM_STR);
        $queryDB->bindParam("keyUser", $data["keyUser"], PDO::PARAM_STR);
        $queryDB->bindParam("keyPassword", $data["keyPassword"], PDO::PARAM_STR);
        //Execute
        $queryDB->execute();
        //Retorno
        return $queryDB->rowCount();
        //Close connection
        $queryDB = null;
    }
}
