<?php
// init
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('LIB_PATH', ROOT_PATH . DS . 'library');
define('SRC_PATH', ROOT_PATH . DS . 'src');
define('VENDOR_PATH', ROOT_PATH . DS . 'vendor');
define('APP_PATH', SRC_PATH . DS . 'application');
define('PUBLIC_PATH', SRC_PATH . DS . 'public');
define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'production');

// Composer autoload
require_once VENDOR_PATH . DS . 'autoload.php';
// Gestion personnalisée des exceptions
set_exception_handler(array('\Ip\Error', 'handleException'));
set_error_handler(array('\Ip\Error', 'handleError'));


$application = new Ip\Application(APPLICATION_ENV);

$application->run();

