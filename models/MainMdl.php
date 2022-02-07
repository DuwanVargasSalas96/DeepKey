<?php
	/*--------------------------------------
	  Main Class Model
	--------------------------------------*/
	class MainMdl
	{
		/* Method to handle navigation */
		public static function nav($module)
		{
			// Declare
			$dir = "views/modules/";
			$modules = array("exit", "login", "home", "keylist", "profile", "registerProfile");
			
			// Set module
			if (in_array($module, $modules)) {
				$dir = $dir . $module . ".php";
			}
			else {
				$dir = $dir . "home.php";
			}
			
			// Return
			return $dir;
		}
	}
?>
