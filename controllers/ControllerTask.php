<?php

class ControllerTask extends Controller
{

    public function actionIndex()
    {
        parent::actionIndex();

    }

    /*
     * Get Tasks Function
     * Return tasks array
     */
    public function actionGetTasks()
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        $data = ModelTask::getTasks($user_id);
        //var_dump($data);
        echo json_encode($data);
    }

    /*
     * Edit Task Function
     * Return task array
     */
    public function actionEditTask()
    {
        if (isset($_GET['id']) && $_GET['id']>0){
            $data = ModelTask::editTask($_GET['id']);

        }
        echo json_encode($data);
    }

    /*
     * Save Task Function
     *
     */
    public function actionSaveTask()
    {
        if (isset($_POST)){
            $data = $_POST;
            session_start();
            $data['user_id'] = $_SESSION['user_id'];
            ModelTask::saveTask($data);

        }
        echo json_encode(1);
    }
}