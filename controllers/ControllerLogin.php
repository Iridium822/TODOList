<?php


class ControllerLogin extends Controller
{
    public $model;

    public function __construct()
    {

        //$this->model = new ModelLogin();
    }

    public function actionIndex()
    {
        //$data["login_status"] = "";
        // TODO: add registration users module, hash password, verification users
        if(isset($_POST['login']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $password =$_POST['password'];
            if (ModelLogin::getLogin($login,$password)){
                session_start();
                $_SESSION['user_id'] = ModelLogin::getLogin($login,$password);
                $_SESSION['user_login'] =  $login;
                $data["login_status"] = "access_enable";
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'main/';
                header("Location: http://$host$uri/$extra");
                exit;


            }else{
                $data["login_status"] = "access_denied";
            }

        }
        else{
            $data["login_status"] = " ";

        }
        View::generate('login_view.php', 'template_view.php', $data);

    }
}