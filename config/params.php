<?php
define('ROUTES',[
    'controller_action' => '^(?<controller>[a-z]+)?/?(?<action>[a-z]+)?/?$',
    'admin_controller_action' => '^(?<prefix>admin)/?(?<controller>[a-z]+)/?(?<action>[a-z]+)?/?$'
]);
define('ROUTE_DEFAULT',[
    'controller' => 'main',
    'action' => 'index'
]);
define('ROUTE_ADMIN_DEFAULT',[
   'controller' =>'mainAdmin',
   'action' =>'index'
]);
define('APP_ARRAYS',[
    '_POST' => 'POST',
    '_FILES' => 'FILES',
    '_SESSION' => 'SESSION',
    '_COOKIE' => 'COOKIE'
]);
$routerCheck = [
    'controller' => '',
    'action' => ''
];

define("LAYOUT_COMPONENTS_LIST",[
    'default' => ['header','sidebar','footer'],
    'admin' => ['header','sidebar']
]);

define('GET_DELIMITER','&');
define('PARAMS_DELIMETER','=');
define('DEFAULT_STRIP_POSITION',1);
define('EMPTY_QUERY','');
define("LOG_DIVIDER"," | ");
define("DB_QUERY_ERROR_OK","00000");
define('AMOUNT_TRENDING_POSTS',4);
define('AMOUNT_RESENT_POSTS',3);
define('AMOUNT_CATEGORY_POSTS',5);
define('DATE_FORMAT_TYPE','Y-m-d');
define('CONTENT_PART',100);