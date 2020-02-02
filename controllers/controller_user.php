<?php


class Controller_User extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        session_start();

        /*
        Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
        в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
        Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
        */
        if ($_SESSION['user_id'] && $_SESSION['user_login'])
        {
            $this->view->generate('user_view.php', 'template_view.php');
        }
        else
        {
            session_destroy();
            Route::ErrorPage404();
        }

    }

    // Действие для разлогинивания администратора
    function action_logout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }
}