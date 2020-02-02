<?php
namespace app\core;
/*
 * Abstract controller class
 */
abstract class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new app/core/View();
    }

    abstract function action_index();

}