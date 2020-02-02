<?php


class Model_Task extends Model
{
    public function get_data()
    {
        parent::get_data(); // TODO: Change the autogenerated stub
    }

    static public function getTasks(){

        $tasks = ORM::for_table('tasks')->
            join('users', 'tasks.id_user = users.id_user')
            ->order_by_desc('task_date')
            ->find_array();
        return $tasks;
    }

    static public function editTask($id){
        $tasks = ORM::for_table('tasks')->where('id_task', $id)->find_array();
        $task = $tasks[0];
        $comments = ORM::for_table(comments)->where('id_task', $id)->find_array();
        $task['comments'] = $comments;
        return $task;

    }

    static public function saveTask($data){
        var_dump($data);
        $id_task = $data['task_id'];
        echo $id_task;
        ORM::configure('id_task', 'primary_key');
        $task = ORM::for_table('tasks_copy')->where('id', $id_task)->find_one();
        echo $task->task_name;
        var_dump($task);
        ORM::configure('id_task', 'primary_key');
        //$task->set(array(
           //'id_task' => $data['task_id'],
           // 'task_status' => $data['task_status'],
          //  'task_description'  => $data['task_description'],
          //  'task_name' => $data['task_name']));
      //$task->id_task=$id_task;
     $task->task_status=$data['task_status'];
     $task->task_description=$data['task_description'];
       $task->task_name=$data['task_name'];
       $task->task_date = date('Y-m-d H:i:s');
      $task->save();
        return true;
    }
}