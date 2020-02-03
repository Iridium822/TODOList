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

        header('Location:/TODOList/login/');
    }
}