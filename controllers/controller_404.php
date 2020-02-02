<?php


class Controller_404 extends Controller
{
    public function action_index()
    {
        return $this->view->generate('404_view.php','template_view.php');
    }
}