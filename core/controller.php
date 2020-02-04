<?php


/*
 * Controller class
 */

class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }

    public function actionIndex()
    {
        session_start();
        if ($_SESSION['user_id'] && $_SESSION['user_login']){
            //header('Location: /TODOList/views/index.php');
            view::generate('main_view.php', 'template_view.php');
        }else{
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login/';
            header("Location: http://$host$uri/$extra");
            exit;

        }

    }

}