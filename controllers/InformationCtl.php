<?php
    /*--------------------------------------
	  Information Class Controller
	--------------------------------------*/
    class InformationCtl
    {
        /* Method to handle content of the information page */
        public function main()
        {
            // Catch data
            if (isset($_GET["inf"]) && $_GET["inf"] === sha1("profile-created")) {
                // Change content
                echo "<script> changePageInformation('¡Cuenta creada correctamente!', 'Ya puede iniciar sesión.', 'fa-check text-success'); </script>";
            } else if (isset($_GET["inf"]) && $_GET["inf"] === sha1("profile-deleted")) {
                // Change content
                echo "<script> changePageInformation('¡Su cuenta se ha eliminado correctamente!', 'Lamentamos que se marche.', 'fa-sad-cry text-primary'); </script>";
            } else if (isset($_GET["inf"]) && $_GET["inf"] === sha1("renew-login")) {
                // Change content
                echo "<script> changePageInformation('¡Cambios aplicados correctamente!', 'Por favor inicie sesión nuevamente', 'fa-check text-success'); </script>";
            } else {
                // Change content of the page                
                echo "<script> changePageInformation('¡Error, página no existe!', '', 'fa-times text-danger'); </script>";
            }
        }
    }
?>
