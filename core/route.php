<?php


/*
 * Router Class
 */

class Route
{
    static public function start()
    {

        spl_autoload_register(function ($class) {
            if (file_exists('Core/'.$class . '.php')) {
                require 'Core/' . $class . '.php';
            }
            if (file_exists('Controllers/'.$class . '.php')) {
                require 'Controllers/'.$class . '.php';
            }
            if (file_exists('Models/'.$class . '.php')) {
            require 'Models/'.$class . '.php';
            }
        });

        $routes = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $controller_name = (!empty($routes[2]))?$routes[2]:'main';
        $action_name = (!empty($routes[3]))?$routes[3]:'index';
        $controller_classname = 'Controller'.strtolower($controller_name);
        $model_classname = 'Model'.strtolower($controller_name);
        $action_name = 'action'.$action_name;
        $controller_path = 'Controllers/Controller'.strtolower($controller_name).'.php';
        //var_dump($routes);
        //echo "Model: $model_classname <br>";
        //echo "Controller: $controller_classname <br>";
        //echo "Action: $action_name <br>";

        if (file_exists($controller_path)) {
        //echo $controller_classname;
            $controller_name1 = new $controller_classname();
            if (method_exists($controller_name1, $action_name)) {


                $controller_name1->$action_name();
            }
            else{
                Route::ErrorPage404();
            }
        }else{
            Route::ErrorPage404();
        }
    }

    static public function ErrorPage404()
    {
        //$host = $_SERVER['HTTP_HOST'];
        //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        //$extra = 'Page404/';

        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        //header('Location:http://$host$uri/$extra 404');

    }

}