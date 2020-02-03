<?php


class ModelTask extends Model
{
    public function getData()
    {

    }

    /*
     * Get Tasks Function
     * Return tasks array from database
     */
    static public function getTasks($user_id)
    {

        $tasks = ORM::for_table('tasks')->where('id_user', $user_id)
            ->order_by_desc('task_date')
            ->find_array();
        //var_dump($tasks);
        //echo count($tasks);
        for ($i=0; $i < count($tasks); $i++){
            //$count_comments = 0;
            $comments = ORM::for_table('comments')->where('id_task', $tasks[$i]['id'])->find_array();
            //var_dump($comments);
            $count_comments = count($comments);
            $tasks[$i]['countComments'] = $count_comments;
        }

        return $tasks;
    }


    /*
     * Edit Task Function
     *
     */
    static public function editTask($id)
    {
        $tasks = ORM::for_table('tasks')->where('id', $id)->find_array();
        $task = $tasks[0];
        $comments = ORM::for_table('comments')->where('id_task', $id)->find_array();
        $task['comments'] = $comments;
        return $task;

    }

    static public function saveTask($data)
    {

        $id_task = $data['task_id'];
        if ($id_task > 0) {
            $task = ORM::for_table('tasks')->where('id', $id_task)->find_one();
        } else {
            $task = ORM::for_table('tasks')->create();
            $task->id_user=1;
        }

        $task->task_status=$data['task_status'];
        $task->task_description=$data['task_description'];
        $task->task_name=$data['task_name'];
        $task->task_date = date('Y-m-d H:i:s');
        $task->save();

    }
}