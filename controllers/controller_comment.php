<?php


class Controller_Comment
{
    function action_index()
    {
        //$data = $this->model->getTasks();
        //$this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_saveComment(){
        if (isset($_POST)) {
            $data = $_POST;
            model_comment::saveComment($data);
        }//var_dump($data);
        echo json_encode(1);
    }
}