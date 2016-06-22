<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('APP_ENV',  'staging');
define('APP_ROOT', __DIR__);

/**
 *
 */
spl_autoload_register(function ($class) {
    require APP_ROOT.'/src/'.str_replace('\\', '/', $class).'.php';
});
require APP_ROOT.'/vendor/autoload.php';
