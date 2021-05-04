<?php
session_start();
require_once dirname(__DIR__) . "/config/init.php";
error_reporting(DEBUG_MODE);
$is_unknown = false;
autoloader();
$queryString = queryStrip(QUERY_STRING);
App();


