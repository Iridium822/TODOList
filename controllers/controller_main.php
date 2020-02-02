<?php


class Controller_Main extends Controller
{

    function action_index()
    {
        session_start();
        if ($_SESSION['user_id'] && $_SESSION['user_login']){
            //header('Location: /TODOList/views/index.php');
           view::generate('main_view.php', 'template_view.php');
        }else{
            header('Location:/TODOList/login/');
        }

    }

    // Действие для разлогинивания администратора
    function action_logout()
    {
        session_start();
        session_destroy();

        header('Location:/TODOList/login/');
    }
}