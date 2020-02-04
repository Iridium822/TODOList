<?php


class ControllerMain extends Controller
{

    public function actionIndex()
    {
        parent::actionIndex();


    }

    /*
     * Logout Function
     */
    public function actionLogout()
    {
        session_start();
        session_destroy();
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'login/';
        header("Location: http://$host$uri/$extra");
        exit;
        //header('Location:/login/');
    }
}