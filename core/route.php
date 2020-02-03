<?php


/*
 * Router Class
 */

class Route
{
    static public function start()
    {
        // default
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // get controller name
        //TODO: Parsing url function
        if ( !empty($routes[2]) ){
            $controller_name = $routes[2];
        }

        // get action name
        if ( !empty($routes[3]) ){
            $action_name = $routes[3];
        }

        // add prefix
        $model_name = 'Model'.$controller_name;
        $controller_name = 'Controller'.$controller_name;
        $action_name = 'action'.$action_name;


        //echo "Model: $model_name <br>";
        //echo "Controller: $controller_name <br>";
        //echo "Action: $action_name <br>";


        // get model file
        $model_file = strtolower($model_name).'.php';
        $model_path = "models/".$model_file;
        if(file_exists($model_path)){
            require "models/".$model_file;
        }

        // get controller file
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "controllers/".$controller_file;
        if(file_exists($controller_path)){
            require "controllers/".$controller_file;
        }
        else{

            Route::ErrorPage404();
        }

        // create controller
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)){
            // Run action
            $controller->$action();
        }
        else{
            Route::ErrorPage404();
        }

    }

    static public function ErrorPage404()
    {
        $host = 'http://'.SERVER_PATH;
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');

    }

}