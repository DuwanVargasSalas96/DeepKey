<?php
	/*--------------------------------------
	  Regular Expressions Class
	--------------------------------------*/
	class Regex
	{
		// Atributes
		private static $texts = "/^[\sa-zA-ZñÑáéíóúÁÉÍÓÚ]{3,50}$/";
		private static $pwds = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\^\+\-\_\*\.\!\¡\@\#\$\%\&\(\)\[\]])([\w\s\^\+\-\_\*\.\!\¡\@\#\$\%\&\(\)\[\]]){8,50}$/";
		
		/* Getters */
		public static function texts()
		{
			return self::$texts;
		}

		public static function pwds()
		{
			return self::$pwds;
		}
	}
?>