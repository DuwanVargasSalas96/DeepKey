<?php
    class MainC
    {
        //Load template
        public function template()
        {
            include "views/template.php";
        }

        //Navigation pages model
        public function nav()
        {
            //Catch
            if (isset($_GET["kb"])) {
                $module = $_GET["kb"];
            } else {
                $module = "home";
            }
            //Show page
            include MainM::nav($module);
        }
    }
?>