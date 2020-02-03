<?php
// Server path
define ("SERVER_PATH", $_SERVER['SERVER_NAME']."/TODOList/");

// DB cofiguration
ORM::configure('mysql:host=localhost;dbname=database1');
ORM::configure('username', 'root');
ORM::configure('password', '');
