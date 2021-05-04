<?php
define('QUERY_STRING',$_SERVER['QUERY_STRING']);
define('DEBUG_MODE',0);

define('ROOT',dirname(__DIR__) ."/");
define('SITE_DOMAIN',"http://modernblog/");
define('CORE', ROOT . "core/");
define('CORE_EXCEPTION', CORE . ".htaccess");
define('AUTOLOADER',CORE . "autoloader/");
define('CONFIG',ROOT . "config/");
define('APP',ROOT ."app/");
define('CONTROLLERS',APP . "controllers/");
define('MODELS',APP . "models/");
define('VIEWS',APP . "views/");
define('TMP',ROOT . "tmp/");
define('LOGS',TMP ."logs.txt");
define('LAYOUTS',VIEWS . "layouts/");
define('DEFAULT_LAYOUT', LAYOUTS . "default/");
define('ADMIN_LAYOUT',LAYOUTS . "admin/");
define('FATAL_ERROR_LAYOUT',VIEWS . "errors/fatal_error.php");
define('RESOURCES',ROOT . "resources/");


require_once CONFIG . "db_config.php";
require_once CONFIG . "params.php";
require_once CONFIG . "routes.php";
require_once CONFIG . "urls.php";
require_once CONFIG . "meta_params.php";
require_once AUTOLOADER . "autoloader.php";


