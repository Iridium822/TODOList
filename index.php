<?php
// Autoload classes
//spl_autoload_register(function ($class) {
   // if (file_exists('Core/'.$class . '.php')) {
       // require_once 'Core/' . $class . '.php';
    //}
//});


require_once 'core/route.php';
// Load package
require_once 'vendor/autoload.php';

//Load project config
require_once 'cfg/config.php';

// Run project


Route::start();