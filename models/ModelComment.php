<?php


class ModelComment extends Model
{
    public function getData()
    {
        //TODO
    }
    /*
     * Save Comment Function
     */
    static public function saveComment($data)
    {
       // var_dump($_POST);
        $comment = ORM::for_table('comments')->create();
        $comment->id_task = $data['task_id'];
        $comment->text_comment = $data['text_comment'];
        $comment->comment_date = date('Y-m-d H:i:s');
        $comment->save();

    }
}