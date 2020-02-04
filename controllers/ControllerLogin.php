<?php


class ControllerLogin extends Controller
{
    /*
     * Login function
     */
    public function actionIndex()
    {

        session_start();
        if (!isset($_SESSION['user_id']) && !isset($_SESSION['login'])) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = true;
            header('WWW-Authenticate: Basic realm="Backend"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Authenticate required!';
            exit;

        } else {
            if (isset($_SERVER['PHP_AUTH_USER']) && ModelLogin::getLogin(strtolower($_SERVER['PHP_AUTH_USER']), $_SERVER['PHP_AUTH_PW'])) {
                $_SESSION['user_id'] = ModelLogin::getId(strtolower($_SERVER['PHP_AUTH_USER']));
                $_SESSION['user_login'] = strtolower($_SERVER['PHP_AUTH_USER']);
                $host = $_SERVER['HTTP_HOST'];
                $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'main/';
                header("Location: http://$host$uri/$extra");
                exit;
            }else{
                echo 'Authenticate required!';
                session_destroy();
                session_unset($_SESSION['user_id']);
                session_unset($_SESSION['user_login']);
            }

        }
    }

    /*
     * Logout function
     */
    public function actionLogout()
    {
        session_start();
        session_destroy();
        session_unset($_SESSION['user_id']);
        session_unset($_SESSION['user_login']);
        $host = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'login/';
        header("Location: http://$host$uri/$extra");

    }
}