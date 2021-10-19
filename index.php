<?php
    //Import controllers and models
    require_once "controllers/Main.php";
    require_once "controllers/Login.php";
    require_once "models/Main.php";
    require_once "models/Login.php";
    require_once "models/Crud.php";

    //Create object
    $template = new MainC();
    $template->template();
?>