<?php
/**
*	Developed and Maintained By: USPF ICT Systems Development Team
*		Sr. Developer: Boi Archievald Ranay
*		Jr. Developer: John Andrie Pareja
* 	Yr: 2016
*/

function init_config() {
	
	/**
	*	CONFIGURATION FILE FOR THE APPLICATION
	*
	*	
	*/
	$configuration = array (
	
	/**
	*	Log file directory
	*
	*/
		"LOGGER_CONFIG"		=> array (
				"LOG_DIR" 		=> "bin\logs\\",
				"LOG_FILE"		=> "app_log.log" 
		),
		
		
	/**
	*	Encoding type
	*
	*/
		"ENCODING_TYPE"		=> array (
				"CHARSET" 		=> "UTF-8"
		),
		
		
	/**	
	*	to configure server:
	*		"DB_SERVER_"=> array (
	*			"_HOST" 	=> "host_ip/host_name",
	*			"_DATABASE" => "Database_name",
	*			"_USER"		=> "Database_username",
	*			"_PASS"		=> "Database_password",
	*			"_PORT"		=> "Database_host_port" 
	*		),
	*/
		"DB_SERVER_"		=> array (
				"HOST" 			=> "",
				"DATABASE" 		=> "",
				"USER"			=> "",
				"PASS"			=> "",
				"PORT"			=> "" #,
			)
	/**
	*	to add another database server add 
	*
	*		"DB_SERVER_01"	=> array (
	*			"_HOST_1" 		=> "host_ip/host_name",
	*			"_DATABASE_1"   => "Database_name",
	*			"_USER_1"		=> "Database_username",
	*			"_PASS_1"		=> "Database_password",
	*			"_PORT_1"		=> "Database_host_port" 
	*		),
	*/
	);


	/*
	*	initialize the configurations to a global constant
	*
	*/
	foreach($configuration as $category) {
		foreach($category as $key => $value) { define($key,$value); }
	}
}



init_config();
?>
