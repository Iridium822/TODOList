<?php


class ControllerComment extends Controller
{
    public function actionIndex()
    {
        parent::actionIndex();

    }

    /*
     * Save Comment Function
     */
    public function actionSaveComment()
    {
        if (isset($_POST)) {
            $data = $_POST;
            ModelComment::saveComment($data);
        }

        echo json_encode(1);
    }
}