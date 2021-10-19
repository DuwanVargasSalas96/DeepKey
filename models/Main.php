<?php
    class MainM
    {
        //Navigation pages model
        public static function nav($module)
        {
            //Declare
            $dir = "views/modules/";
            $modules = array("login", "home", "exit");

            //Control
            if (in_array($module, $modules)) {
                $dir = $dir . $module . ".php";
            } else {
                $dir = $dir . "home.php";
            }

            //Return
            return $dir;
        }
    }
?>
