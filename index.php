<?php
// Autoload classes
spl_autoload_register(function ($class) {
    require_once 'Core/'.$class . '.php';
});

// Load package
require_once 'vendor/autoload.php';

//Load project config
require_once 'cfg/config.php';

// Run project


Route::start();