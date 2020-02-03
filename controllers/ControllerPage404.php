<?php

class ControllerPage404 extends Controller
{
    public function action_index()
    {
        return View::generate('404_view.php','template_view.php');
    }
}