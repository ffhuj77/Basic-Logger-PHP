<?php
/**
*	Developed and Maintained By: USPF ICT Systems Development Team
*		Sr. Developer: Boi Archievald Ranay
*		Jr. Developer: John Andrie Pareja
* 	Yr: 2016
*/

/**
*	This Class is used for logging Processes/Actions/Warnings/Errors
*	 
*	To Configure:
*		Please check the app_config.php to configure the log file dir
*
*   To initialize this class:
*			NOTE: include first the app_config.php before including this class
*				It will Generate Errors!
*
*		include(\file\dicectory\Logger.php);
*	
*	To use the functions:
*
*		Logger::Info($ErrorMessage);
*
*		echo Logger::Info($ErrorMessage, true);
*/
class Logger {

	
	/**
	*	Log Level Discriptions
	* 
	*/
	const LL = array(
		0 => 'EMERGENCY', 	// system is unusable
		1 => 'ALERT',		// action must be taken immediately
		2 => 'CRITICAL',	// critical conditions
		3 => 'ERROR',		// error conditions
		4 => 'WARNING',		// warning conditions
		5 => 'NOTICE',		// normal but significant condition
		6 => 'INFO',		// informational messages
		7 => 'DEBUG'		// debug-level messages
	);
	
	
	/**
	*	Gets the Log Level returns false if parameter is not
	*	an integer
	*	
	*	@param int $level
	*
	*	@return string LogLevel
	*/
	private function getLogLevel($level) {
		
		return (is_integer($level)) ? self::LL[$level] : false;
		
	}
	
	
	/**
	*	Appends to an existing log file; and if no file found
	*	it will create a new empty Log File.
	*
	*	@param int		$loglevel
	*	@param string   $ErrorMessage
	*	@param date		$date = ''
	*/
	private function LogThis($LogLevel, $ErrorMessage, $date = '') {
		
		$date = (empty($date)) ? "[".date("Y-d-m h:m:s")."]" : "[".$date."]";

		$FileHandl = fopen(LOG_DIR.LOG_FILE, 'a');
		
		$level = "[".self::getLogLevel($LogLevel)."]";
		
		$dataToInsert = $date.$level.": ".$ErrorMessage.PHP_EOL;
		
		fwrite($FileHandl,$dataToInsert);
		
		fclose($FileHandl);
	}
	
	
	/**
	* 	Appends to an existing log file then returns
	*	the log Massage
	*
	*	@param int $loglevel 
	*	@param string $ErrorMessage
	*
	*	@return string
	*/
	private function LogAndGet($LogLevel, $ErrorMessage) {
		
		self::LogThis($LogLevel, $ErrorMessage);
		
		$data = "[".self::getLogLevel($LogLevel)."] ". $ErrorMessage;
		
		return $data;
		
	}
	
	
	/**
	* 	Public Methods
	*/

	
	/**
	* 	Sends or returns an Debug Log
	*
	*	@param string $message
	*	@param boolean $print = true
	*/
	public static function Debug($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(7,$message);
				
			} else {
				
				return self::LogAndGet(7,$message);
			}
		}
		
	}

		
	public static function Info($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(6,$message);
				
			} else {
				
				return self::LogAndGet(6,$message);
			}
		}
		
	}
	
	
	public static function Notice($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(5,$message);
				
			} else {
				
				return self::LogAndGet(5,$message);
			}
		}
		
	}

		
	public static function Warning($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(4,$message);
				
			} else {
				
				return self::LogAndGet(4,$message);
			}
		}
		
	}

		
	
	public static function Error($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(3,$message);
				
			} else {
				
				return self::LogAndGet(3,$message);
			}
		}
		
	}

	
	public static function Critical($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(2,$message);
				
			} else {
				
				return self::LogAndGet(2,$message);
			}
		}
		
	}
	
	
	public static function Alert($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(1,$message);
				
			} else {
				
				return self::LogAndGet(1,$message);
			}
		}
	}
	
	
	public static function Emergency($message, $print = false) {
		
		if(is_bool($print)) {
			
			if(!$print) {
				
				self::LogThis(0,$message);
				
			} else {
				
				return self::LogAndGet(0,$message);
			}
		}
	}
	
	
}



// checking file if not exists
if(!file_exists(LOG_DIR.LOG_FILE)) {
	
	$FileHandl = fopen(LOG_DIR.LOG_FILE, 'w+');
	
	$write = "/* --------------------------------------------------------------------------".PHP_EOL.
			 "/* THE PREVIOUS LOG FILE CANNOT BE FOUND: EITHER DELETED OR NOT YET GENERATED".PHP_EOL.
			 "/* THIS LOG FILE WAS GENERATED ON: [".date("m-d-Y h:m:s")."]".PHP_EOL.
			 "/* --------------------------------------------------------------------------".PHP_EOL;
	
	fwrite($FileHandl, $write);
	
	fclose($FileHandl);
	
}

?>
