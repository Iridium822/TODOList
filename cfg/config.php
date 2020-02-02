<?php

define ("SERVER_PATH", $_SERVER['SERVER_NAME']."/TODOList/");
ORM::configure('mysql:host=localhost;dbname=database1');
ORM::configure('username', 'root');
ORM::configure('password', '');
ORM::configure('id_task', 'primary_key');