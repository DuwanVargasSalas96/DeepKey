<?php
	/*--------------------------------------
	  Regular Expressions Class
	--------------------------------------*/
	class Regex
	{
		// Atributes
		private static $texts = "/^[\sa-zA-ZñÑáéíóúÁÉÍÓÚ]{3,50}$/";
		private static $pwds = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\^\+\-\_\*\.\!\¡\@\#\$\%\&\(\)\[\]])([\w\s\^\+\-\_\*\.\!\¡\@\#\$\%\&\(\)\[\]]){8,50}$/";
		private static $keyNames = "/^[\s\w]{3,50}$/";
		private static $keyUsers = "/(^[\w]{3,50}$)|(^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/";
		private static $keyPwds = "/(^[\d]{4,8}$)|(^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([\w]){6,50}$)|(^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\^\+\-\_\*\.\!\¡\@\#\$\%\&\(\)\[\]])([\w\+\-\_\*\.\!\¡\@\#\$\%\&\(\)\[\]]){8,50}$)/";
		private static $keyNotes = "/[\s\wñÑáéíóúÁÉÍÓÚ]{0,150}/";
		
		/* Getters */
		public static function texts()
		{
			return self::$texts;
		}

		public static function pwds()
		{
			return self::$pwds;
		}

		public static function keyNames()
		{
			return self::$keyNames;
		}

		public static function keyUsers()
		{
			return self::$keyUsers;
		}

		public static function keyPwds()
		{
			return self::$keyPwds;
		}

		public static function keyNotes()
		{
			return self::$keyNotes;
		}
	}
?>