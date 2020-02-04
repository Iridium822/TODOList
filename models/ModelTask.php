<?php


class ModelTask extends Model
{
    public function getData()
    {

    }

    /*
     * Get Tasks Function
     * @Return tasks array
     */
    static public function getTasks($user_id)
    {
        $tasks = ORM::for_table('tasks')->left_outer_join('comments', 'comments.id_task=tasks.id')->
        selectMany('tasks.id','tasks.task_status','tasks.task_date','tasks.task_name','tasks.task_description')->
            select_expr('COUNT(comments.id)', 'countComments')->
            groupBy('tasks.id')->order_by_desc('task_date')->findArray();
        //var_dump($tasks);

        return $tasks;
    }


    /*
     * Edit Task Function
     *@return task array
     */
    static public function editTask($id)
    {

        $tasks = ORM::for_table('tasks')->where('id', $id)->find_array();
        $task = $tasks[0];
        $comments = ORM::for_table('comments')->where('id_task', $id)->find_array();
        //var_dump($tasks);
        $task['comments'] = $comments;
        return $task;

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