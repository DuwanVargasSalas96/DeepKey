<?php
    //Session control
    session_start();
    //Import
    require_once "../models/Crud.php";

    //Edit key
    if (isset($_POST["editKeyName"]) && isset($_POST["editKeyUser"]) && isset($_POST["editKeyPassword"]) && isset($_POST["editKey"]) && preg_match("/^[\w\d\sñÑáéíóúÁÉÍÓÚ.]{3,32}$/", $_POST["editKeyName"]) && preg_match("/^[\w\d\sñÑáéíóúÁÉÍÓÚ.@]{5,32}$/", $_POST["editKeyUser"]) && preg_match("/^[\w\d\s.!¡@#$%&()\[\]]{3,32}$/", $_POST["editKeyPassword"])) {
        //Declare
        $data = array("keyName" => $_POST["editKeyName"], "keyUser" => $_POST["editKeyUser"], "keyPassword" => $_POST["editKeyPassword"], "keyId" => $_POST["editKey"]);
        //Invoke model
        $reply = DataDB::accountUpdate($_SESSION["user"], $data);
        //Return
        echo $reply;
    }

    //Delete key
    if (isset($_POST["deleteKey"]) && preg_match("/^\d*$/", $_POST["deleteKey"])) {
        //Invoke model
        $reply = DataDB::accountDelete($_SESSION["user"], $_POST["deleteKey"]);
        //Return
        echo $reply;
    }

    //Get information key
    if (isset($_POST["informationKey"]) && preg_match("/^\d*$/", $_POST["informationKey"])) {
        //Invoke model
        $dataKey = DataDB::accountInformation($_SESSION["user"], $_POST["informationKey"]);
        //Return
        echo json_encode($dataKey);
    }

    //List keys
    else if (isset($_POST["listRequest"]) && $_POST["listRequest"] == true) {
        //Invoke model
        $keys = DataDB::accountList($_SESSION["user"]);
        //Return
        foreach ($keys as $key) {
            echo '<li class="list-group-item list-group-item-action" value="' . $key["DeepKeyId"] . '">' . $key["Name"] . '</li>';
        }
    }

    //Add key
    if (isset($_POST["registerKeyName"]) && isset($_POST["registerKeyUser"]) && isset($_POST["registerKeyPassword"]) && preg_match("/^[\w\d\sñÑáéíóúÁÉÍÓÚ.]{3,32}$/", $_POST["registerKeyName"]) && preg_match("/^[\w\d\sñÑáéíóúÁÉÍÓÚ.@]{5,32}$/", $_POST["registerKeyUser"]) && preg_match("/^[\w\d\s.!¡@#$%&()\[\]]{3,32}$/", $_POST["registerKeyPassword"])) {
        //Declare
        $data = array("keyName" => $_POST["registerKeyName"], "keyUser" => $_POST["registerKeyUser"], "keyPassword" => $_POST["registerKeyPassword"]);
        //Invoke
        $reply = DataDB::accountRegister($_SESSION["user"], $data);
        //Return
        echo $reply;
    }
?>
