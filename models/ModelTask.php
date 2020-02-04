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
        $tasks = ORM::for_table('tasks')->join('comments','tasks.id=comments.id_task')->where('id', $id)->find_array();
        return $tasks;

    }

    /*
     * Save Task Function
     */
    static public function saveTask($data)
    {

        $id_task = $data['task_id'];
        // Edit Task
        if ($id_task > 0) {
            $task = ORM::for_table('tasks')->where('id', $id_task)->find_one();
        // Create Task
        } else {

            $task = ORM::for_table('tasks')->create();
            $task->id_user = $data['user_id'];
        }

        $task->task_status=$data['task_status'];
        $task->task_description=$data['task_description'];
        $task->task_name=$data['task_name'];
        $task->task_date = date('Y-m-d H:i:s');
        $task->save();

    }
}