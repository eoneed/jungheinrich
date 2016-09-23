<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('APP_ENV',  'staging');
define('APP_ROOT', __DIR__);

/**
 *
 */
spl_autoload_register(function ($class) {
    $filename = APP_ROOT.'/src/'.str_replace('\\', '/', $class).'.php';
    
    if (file_exists($filename)) {
        require $filename;
    }
});
require APP_ROOT.'/vendor/autoload.php';
