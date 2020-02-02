<?php


class Controller_Task extends Controller
{


    function action_index()
    {
        //$data = $this->model->getTasks();
        //$this->view->generate('task_view.php', 'template_view.php', $data);
    }

    function action_getTasks(){
        $data = model_task::getTasks();
        //var_dump($data);
        echo json_encode($data);
    }

    function action_editTask(){
        if (isset($_GET['id']) && $_GET['id']>0){
            $data = model_task::editTask($_GET['id']);
            echo json_encode($data);
        }

    }

    function action_saveTask(){
        if (isset($_POST)){
            $data = $_POST;
            model_task::saveTask($data);
        }
    }
}