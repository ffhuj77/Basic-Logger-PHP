<?php
/**
*   make sure app_config.php is included first
*   then include the logger.php after
*
*/
require_once('\app_config.php');

require_once('\logger.php');


Logger::Info('This is an info log');
/**
*   Outputs on the log file in bin\log\app_log.log :
*       [16-14-11 5:15:30] [Info] This is an info log
*
*/

echo Logger::Warning('This is an warning log', true);

/**
*   Outputs on the log file in bin\log\app_log.log :
*       [16-14-11 5:18:30] [Warning] This is an info log
*
*   Outputs on the browser:
*       [Warning] This is an info log
*/

?>
