# Basic-Logger-PHP

This Class is used for logging Processes/Actions/Warnings/Errors

## To Configure:

Please check the app_config.php to configure the log file dir

## To initialize this class:

>NOTE: include first the app_config.php before including this class
>It will Generate Errors!


```php
include \file\directory\Logger.php;
```


## To use the functions:

```php
Logger::Info($ErrorMessage);
```

```php
echo Logger::Info($ErrorMessage, true);
```
