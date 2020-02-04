<?php


class ControllerMain extends Controller
{

    public function actionIndex()
    {
        session_start();
        if ($_SESSION['user_id'] && $_SESSION['user_login']){

            view::generate('main_view.php', 'template_view.php');
        }else{
            $host = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login/';
            header("Location: http://$host$uri/$extra");
            exit;

        }

    }



}