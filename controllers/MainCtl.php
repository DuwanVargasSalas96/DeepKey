<?php
	/*--------------------------------------
	  Main class controller
	--------------------------------------*/
	class MainCtl
	{
		/* Method to show template */
		public function template()
		{
			// Show module
			include "views/template.php";
		}
		

		/* Method to handle navigation */
		public function nav()
		{
			// Get module from URL
			if (isset($_GET["kb"])) {
				// Set module
				$module = $_GET["kb"];
			}
			else {
				// Set default module
				$module = "home";
			}

			// Set module from model
			include MainMdl::nav($module);
		}
	}
?>
