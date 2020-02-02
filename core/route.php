<?php


namespace app\core;
/*
 * Router Class
 */

class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', SERVER_PATH);

        // get controller name
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // get action name
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // add prefix
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;


        //echo "Model: $model_name <br>";
        //echo "Controller: $controller_name <br>";
        //echo "Action: $action_name <br>";


        // get model file

        $model_file = strtolower($model_name).'.php';
        $model_path = "models/".$model_file;
        if(file_exists($model_path))
        {
            require_once "models/".$model_file;
        }

        // get controller file
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            require_once "controllers/".$controller_file;
        }
        else
        {

            Route::ErrorPage404();
        }

        // create controller
        $controller = new app/controller/$controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // Run action
            $controller->$action();
        }
        else
        {

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