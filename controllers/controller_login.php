<?php


class Controller_Login extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Login();

    }

    function action_index()
    {
        //$data["login_status"] = "";


        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password =$_POST['password'];
            if ($this->model->getLogin($login,$password)){
                session_start();
                $_SESSION['user_id'] = $this->model->getLogin($login,$password);
                $_SESSION['user_login'] =  $login;
                $data["login_status"] = "access_enable";
                header('Location:/TODOList/main/');


            }else{
                $data["login_status"] = "access_denied";

            }


        }
        else
        {
            $data["login_status"] = " ";

        }
        view::generate('login_view.php', 'template_view.php', $data);

    }
}